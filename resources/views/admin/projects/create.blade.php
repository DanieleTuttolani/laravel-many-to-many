@extends('layouts.bgc_container')
@extends('layouts.app')
@section('content')
@section('c-content')
<div class="my-container text-light vh-100 p-3">
  <h1>Inserisci Progetto</h1>
    <div class="">
        <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- title --}}
            <div class="row g-3 align-items-center my-3 ">
                <div class="col-auto">
                  <label for="title" class="col-form-label">Titolo</label>
                </div>
                <div class="col">
                  <input required type="text" id="title" name="title" class="form-control" value="" aria-describedby="passwordHelpInline">
                </div>
                {{-- type --}}
                <div class="col-3">
                  <select id="type_id" name="type_id" class="form-control">
                    <option value="">Nessun genere</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="showCase" name="showCase">
                    <label class="form-check-label" for="flexCheckIndeterminate">Mostra in vetrina</label>
                  </div>
                </div>
              </div>
              {{-- descrzione --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="description" class="col-form-label">descrizione</label>
                </div>
                <div class="col">
                  <textarea type="text" id="description" name="description" class="form-control"aria-describedby="passwordHelpInline"></textarea>
                </div>
              </div>
              {{-- link git --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="proj_link" class="col-form-label">Link Github</label>
                </div>
                <div class="col">
                  <input type="text" id="proj_link" name="proj_link" class="form-control" value="" aria-describedby="passwordHelpInline">
                </div>
              </div>
              {{--img  --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="img" class="col-form-label">File img</label>
                </div>
                <div class="col">
                  <input required type="file" id="img" name='img' class="form-control"aria-describedby="passwordHelpInline">
                </div>
              </div>
              {{-- collab --}}
              <div class="row g-3 align-items-center my-3">
                <div class="col-auto">
                  <label for="collab" class="col-form-label">Collaboratori</label>
                </div>
                <div class="col">
                  <input type="text" id="collab" name="collab" class="form-control" value="" aria-describedby="passwordHelpInline">
                </div>
                <div>
                  @foreach ($languages as $language)
                  <input type="checkbox" name="lang[]" @checked(in_array($language->id , $project_lang)) id="lang-{{$language->name}}" value="{{$language->id}}  ">
                  <label for="lang">{{$language->name}}</label>
                  @endforeach
                </div>
              </div>

              <button class="btn btn-success">invia</button>
              <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Indetro</a>
        </form>
        
    </div>
</div>
@endsection