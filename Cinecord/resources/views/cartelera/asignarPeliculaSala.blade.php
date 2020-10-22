@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('peliculas.store') }}">

    @csrf

    <div class="container">

        <h1>Asignar Películas a salas</h1>

        <div class="form-group">

            <label for="titulo">Seleccionar Película<br></label>

            <select class="custom-select">
                <option selected>Selecciona una película</option>
                
                @foreach ($peliculas as $p)
            <option value="{{$p->id}}">{{$p->titulo}}</option>
                @endforeach
                
                
              </select>

           
        </div>
        
        <div class="form-group">

            <label for="titulo">Seleccionar Hora<br></label>

            <select class="custom-select">
                <option selected>Seleccionar Hora</option>
                <option selected>18:30</option>
                <option selected>21:00</option>
                <option selected>23:15</option>
              </select>

           
        </div>
        <div class="form-group">

            <label for="titulo">Seleccionar Fecha<br></label>

            <select class="custom-select">
                <option selected>Seleccionar Fecha</option>
                <option selected>21/10/2020</option>
                <option selected>25/10/2020</option>
                <option selected>21/10/2020</option>
              </select>

           
        </div>
        
        
        <div class="form-group">

            <label for="titulo">Seleccionar Sala<br></label>

            <select class="custom-select">
                <option selected>Selecciona una sala</option>
                
                @foreach ($salas as $sala)
            <option value="{{$sala->id}}">{{'Sala '.$sala->id}}</option>
                @endforeach
                
                
              </select>

           
        </div>
       
        

        
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</form>


@endsection