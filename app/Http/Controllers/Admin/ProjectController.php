<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\Type;
use App\Models\Language;
use Illuminate\Support\Arr;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();


        return view('admin.projects.index', compact('projects', ));
    }

    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }
    public function create()
    {
        $types = Type::all();
        $languages = Language::all();
        $project_lang = [];

        return view('admin.projects.create', compact('types', 'languages', 'project_lang'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        $languages = Language::all();

        $project_lang = $project->Languages->pluck('id')->toArray();
        return view('admin.projects.edit', compact('project', 'types', 'languages', 'project_lang'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $request->validate(
            [
                'title' => 'required|string|min:4|max:30',
                'description' => 'required|string',
                'proj_link' => 'required|string|',
                'img' => 'nullable',
                'collab' => 'required|string',
            ],
            [
                'title.required' => 'il titolo del progetto è obbligatorio',
                'title.string' => 'il titolo inserito non è valido',
                'title.min' => 'il titolo deve avere un minimo di 4 caratteri',
                'title.max' => 'il titolo deve avere un massimo di 30 caratteri',
                'description.required' => 'il campo della descrizione è obbligatorio',
                'description.string' => 'la descrizione fornita non è valida',
                'proj_link.required' => 'il link del progetto è obbligatorio',
                'proj_link.string' => 'il link fornito non è valido',
                'collab.required' => 'devi specificare i collaboratori',
                'collab.string' => 'il campo collaboratori non è valido',
            ]
        );

        Storage::delete($project->img);
        $img_path = Storage::put('uploads', $data['img']);
        $data['img'] = $img_path;

        $project->update($data);

        if (Arr::exists($data, 'lang')) {
            $project->Languages()->sync($data['lang']);
        } else
            $project->Languages()->detach();
        return to_route('admin.projects.show', compact('project'))->with('updated', 'il progetto è stato aggiornato');
    }
    public function store(Request $request, Project $new_proj)
    {
        $data = $request->all();
        $request->validate(
            [
                'title' => 'required|string|min:4|max:30',
                'description' => 'required|string',
                'proj_link' => 'required|string|',
                'img' => 'nullable',
                'collab' => 'required|string',
            ],
            [
                'title.required' => 'il titolo del progetto è obbligatorio',
                'title.string' => 'il titolo inserito non è valido',
                'title.min' => 'il titolo deve avere un minimo di 4 caratteri',
                'title.max' => 'il titolo deve avere un massimo di 30 caratteri',
                'description.required' => 'il campo della descrizione è obbligatorio',
                'description.string' => 'la descrizione fornita non è valida',
                'proj_link.required' => 'il link del progetto è obbligatorio',
                'proj_link.string' => 'il link fornito non è valido',
                'collab.required' => 'devi specificare i collaboratori',
                'collab.string' => 'il campo collaboratori non è valido',
            ]
        );
        $img_path = Storage::put('uploads', $data['img']);
        $data['img'] = $img_path;
        $new_proj = new Project();


        $new_proj->fill($data);
        $new_proj->save();

        if (count($data['lang'])) {
            $new_proj->Languages()->attach($data['lang']);
        }
        return to_route('admin.projects.index', compact('new_proj'))->with('created', 'il progetto è stato aggiunto');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        Storage::delete($project->img);
        return to_route('admin.projects.index');
    }
}