<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\Type;
class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        

        return view('admin.projects.index', compact('projects',));
    }

    public function show(Project $project){

        return view('admin.projects.show', compact('project'));
    }
    public function create(){
        $types = Type::all();

        return view('admin.projects.create' , compact('types'));
    }

    public function edit(Project $project){
        $types = Type::all();

        
        return view('admin.projects.edit' , compact('project', 'types'));
    }

    public function update(Request $request , Project $project){
        Storage::delete($project->img);
        $data = $request->all();
        $img_path = Storage::put('uploads', $data['img']);
        $data['img']=$img_path;

        $project->update($data);
        return to_route('admin.projects.show', compact('project'));
    }
    public function store(Request $request, Project $new_proj){
        $data = $request->all();
        $img_path = Storage::put('uploads', $data['img']);
        $data['img']=$img_path;
        $new_proj = new Project();
        
        
        $new_proj->fill($data);
        $new_proj->save();
        
        return to_route('admin.projects.index', compact('new_proj'));
    }
    public function destroy(Project $project){
        $project->delete();
        Storage::delete($project->img);
        return to_route('admin.projects.index');
    }
}
