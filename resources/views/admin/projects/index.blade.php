@extends('layouts.bgc_container')

@extends('layouts.app')
@section('content')
@section('c-content')

<div class="container">
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary"> crea progetto</a>
    
    @if (session('created'))
    <div class="alert alert-success">
        {{session('created')}}
    </div>
    @endif
    @forelse ($projects as $proj)
    <a href="{{url('admin/projects/show' , $proj->id)}}">
        <div class="col rounded p-4 bg-primary m-5 text-light">
            <ul>
                <li class="my-4">Nome:  {{$proj->title}} </li>
                <li class="my-4">Descrizione:  {{$proj->description}} </li>
                <li class="my-4">Link GitHub:  {{$proj->proj_link}} </li>
                <li class="my-4">Img-str:  {{$proj->img}} </li>
                <li class="my-4">Collaboratori:  {{$proj->collab}} </li>
                <li class="my-4">Gruppo:  {{$proj->Type?->title}} </li>
                <li class="my-4">Tecnologie:  
                @foreach ($proj->languages as $lang)
                    {{$lang->name}} 
                @endforeach
                </li>
            </ul>
            <div class="text-center">
                <i class="fa-solid fa-hand-point-up fa-bounce fs-2"></i>
                <h2>Clicca per visualizzare</h2>
            </div>
        </div>
    </a>
    @empty
    <h1>Al Momento non ho progetti da mostrare crea il primo  :  <a href="{{route('admin.projects.create')}}" class="btn btn-primary"> crea progetto</a></h1>
    @endforelse
    
    @endsection
</div>