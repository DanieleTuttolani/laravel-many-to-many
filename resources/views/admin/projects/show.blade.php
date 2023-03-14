@extends('layouts.app')


@section('content')
<div class="my-bgc vh-100 p-5">
    
    @if (session('updated'))
    <div class="alert alert-success">
        {{session('updated')}}
    </div>
    @endif
    
    <div class="my-container mx-auto  bg-secondary text-light p-3 rounded" style="max-width: 700px">
        <div class="col">
            <p>
                <strong>Nome: {{$project->title}}</strong>
            </p>
            <p>
                <strong>descrizione: {{$project->description}}</strong>
            </p>
            <p>
                <strong>Link github: {{$project->proj_link}}</strong>
            </p>
            <p>
                <strong>Collaboratori: {{$project->collab}}</strong>
            </p>
        </div>
        <div class="col">
            <img  class="img-fluid rounded" src="{{asset('storage/'.$project->img)}}" alt="project pic">
        </div>
        <div class="btn-wrapper p-4">
            {{-- go back --}}
            <a href="{{route('admin.projects.index')}}" class="btn btn-primary mx-2">indietro</a>
            {{-- edit --}}
            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-secondary">Modifica</a>
            {{-- delete --}}
            <form action="{{route('admin.projects.destroy' , $project->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning">Elimina</button>
            </form>
        </div>
    </div>
</div>
    {{-- todo aggiungi i bottoni per aggiornare eliminare e indietro--}}


@endsection
