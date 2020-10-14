@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('peliculas.store') }}">

    @csrf

    <div class="container">

        <div class="form-group">

            <label for="titulo">
                Titulo de la pelicula <br>

                <input type="text" class="form-control shadow-sm" id="titulo" name="titulo" value="{{ old('titulo') }}">

            </label>
        </div>

        <div class="form-group">

            <label for="director">
                Director de la pelicula <br>

                <input type="text" class="form-control shadow-sm" id="director" name="director"
                    value="{{ old('director') }}">

            </label>
        </div>

        <div class="form-group">

            <label for="duracion">
                Duracion de la pelicula <br>

                <input type="number" class="form-control shadow-sm" id="duracion" name="duracion"
                    value="{{ old('duracion') }}">

            </label>
        </div>

        <div class="form-group">

            <label for="genero">
                Genero de la pelicula <br>

                <input type="text" class="form-control shadow-sm" id="genero" name="genero" value="{{ old('genero') }}">

            </label>
        </div>

        <div class="form-group">

            <label for="reparto">
                Reparto de la pelicula <br>

                <textarea class="form-control shadow-sm" id="reparto" name="reparto">{{ old('reparto') }}</textarea>

            </label>
        </div>

        <div class="form-group">

            <label for="sinopsis">
                Sinopsis de la pelicula <br>

                <textarea class="form-control shadow-sm" id="sinopsis" name="sinopsis">{{ old('sinopsis') }}</textarea>

            </label>
        </div>

        <div class="form-group">

            <label for="clasificacion">
                Clasificacion por edades de la pelicula <br>

                <input type="text" class="form-control shadow-sm" id="clasificacion" name="clasificacion"
                    value="{{ old('clasificacion') }}">

            </label>
        </div>

        <div class="form-group">

            <label for="estado1">
                Estrenada <br>

                <input type="radio" class="form-control shadow-sm" id="estado1" name="estado" value="estrenada">

            </label>

            <label for="estado2">
                Por estrenar <br>

                <input type="radio" class="form-control shadow-sm" id="estado2" name="estado" value="por estrenar">

            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</form>


@endsection