@extends('layouts.app')

@section('content')
<h1>Modifica</h1>
<div class="my-container container">
    <div class="">
        <form action="{{route('admin.projects.update' , $project->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- title --}}
            <div class="row g-3 align-items-center my-3 ">
                <div class="col-auto">
                  <label for="input-title" class="col-form-label">Titolo</label>
                </div>
                <div class="col">
                  <input type="text" id="title" name="title" class="form-control" value="{{$project->title}}" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-3">
                  <select id="type_id" name="type_id" class="form-control">
                    <option value="">Nessun genere</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              {{-- descrzione --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="input-title" class="col-form-label">descrizione</label>
                </div>
                <div class="col">
                  <textarea type="text" id="description" name="description" class="form-control"aria-describedby="passwordHelpInline">{{$project->description}}</textarea>
                </div>
              </div>
              {{-- link git --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="input-title" class="col-form-label">Link Github</label>
                </div>
                <div class="col">
                  <input type="text" id="proj_link" name="proj_link" class="form-control" value="{{$project->proj_link}}" aria-describedby="passwordHelpInline">
                </div>
              </div>
              {{--img  --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="input-title" class="col-form-label">File immagini</label>
                </div>
                <div class="col">
                  <input type="file" id="img" name="img" class="form-control" value="{{$project->img}}" aria-describedby="passwordHelpInline">
                </div>
              </div>
              {{-- collab --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="input-title" class="col-form-label">Collaboratori</label>
                </div>
                <div class="col">
                  <input type="text" id="collab" name="collab" class="form-control" value="{{$project->collab}}" aria-describedby="passwordHelpInline">
                </div>
              </div>

              <button class="btn btn-success">invia</button>
        </form>
        
    </div>
</div>
@endsection
