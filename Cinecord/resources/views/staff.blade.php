@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-deck border-0 mb-3 shadow-sm">


        <div class="card border-success mb-3">
            <a class="text-dark" href="#">
                <div class="card-body">
                    <h5 class="card-title">Subida manual de peliculas</h5>
                    <p class="card-text">Sube las peliculas rellenando un formulario </p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </a>
        </div>
        <div class="card border-success mb-3">
            <a class="text-dark" href="{{route('fileXML')}}">
                <div class="card-body">
                    <h5 class="card-title">Subida masiva de películas</h5>
                    <p class="card-text">Sube un numero grande de peliculas a través de un archivo XML</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
        </div>
        </a>
    </div>
    <div class="card-deck">
        <div class="card border-success mb-3">
            <a class="text-dark" href="{{route('peliculas.asignarPeliculaSala')}}">
                <div class="card-body">
                    <h5 class="card-title">Asignar cada película a la sala correspondiente</h5>
                    <p class="card-text">Elige cada una de las peliculas de la base de datos y asignala a su sala.
                    </p>
                    <p class="card-text"></small></p>
                </div>
            </a>
        </div>
        <div class="card border-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Futura utilizacion</h5>
                <p class="card-text">Funcionalidad en proceso</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
    </div>
</div>
@endsection