@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('salas.store') }}">

    @csrf

    <div class="container">

        <h1>Crear Salas</h1>

        
        
        <div class="form-group">

            <label for="titulo">Aforo<br></label>

            <select name="aforo" class="custom-select">
                <option selected>Seleccionar Aforo</option>
                <option value="10" selected>10</option>
                <option value="30" selected>30</option>
                <option value="60" selected>60</option>
                
              </select>

           
        </div>
        <div class="form-group">

            <label for="titulo">Tipo de sala<br></label>

            <select name="tipoSala" class="custom-select">
                <option selected>Seleccionar Tipo de Sala</option>
                <option value="3D" selected>3D</option>
                <option value="V.0"selected>V.0</option>
                <option value="Estandar" selected>Estandar</option>
              </select>

           
        </div>
        
        
        
       
        

        
        <button type="submit" class="btn btn-primary">Crear Sala</button>

    </div>

</form>


@endsection