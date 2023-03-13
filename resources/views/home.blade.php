@extends('layouts.bgc_container')
@extends('layouts.app')
@section('content')
    @section('c-content')
        {{-- intestazioni presentazioni e foto --}}
        <div class="struttura-genitore titolo d-flex my-4">
            <div class="img-pit struttura">
                <div class="img-wrapper struttura">
                    <img class="img-fluid" src="https://www.petme.it/wp-content/uploads/2022/07/Schermata-2022-07-14-alle-17.50.21.png" alt="">
                </div>
            </div>
            <div class="desc-wrapper col-5 struttura text-light p-4">
                <div class="name"><h1>Daniele Tuttolani</h1></div>
                <div class="desc"><p>Atri Abruzzo Italia</p></div>
            </div>
            <div class="info wrapper struttura p-4"><h4>Al momento impiegato in nesun progetto</h4></div>
        </div>
        {{-- vetrina progetti --}}
        <section class="projects d-flex">
            {{-- left --}}
            <section class="left d-flex">
                    <div class="struttura-genitore">
                        <div class="title p-1">
                            <h4>Vetrina Progetti</h4>
                        </div>
                        @forelse ($projects as $project)
                        <div class="project-body struttura mb-3 p-3">
                            <img class="img-fluid" src="{{asset('storage/'.$project->img)}}" alt="">
                            <hr class="border-light">
                            <div class="text-wrapper text-light">
                                <div class="col-6"><h4>Sogetto : {{$project->title}} </h4></div>
                                <div class="col-6"><h4>Collaboratori : {{$project->collab}}</h4></div>
                                <div class="col"><h4>Descrizione : {{$project->description}}</h4></div>
                            </div>
                        </div>
                        @empty
                            <div class="project-body">
                                <h1>Non ci sono progetti in vetrina al momento</h1>
                            </div>                   
                        @endforelse
                    </div>
            </section>
            {{-- right --}}
            <section class="right">
                <div class="pit p-3 mx-2 text-light">
                    <h2 class="title">Linguaggi</h2>
                    <div class="p-0">
                        <div class="lang-wrapper d-flex">
                            <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png" alt="">
                            <span class="p-1 ms-2">JavaScript</span>
                        </div>
                        {{-- todo ciclo sui linguaggi --}}
                    </div>
                </div>
            </section>
        </section>
    @endsection
@endsection







