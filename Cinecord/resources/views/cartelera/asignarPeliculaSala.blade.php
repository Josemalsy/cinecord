@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('peliculas.store') }}">

    @csrf

    <div class="container">

        <div class="form-group">

            <label for="titulo">Seleccionar Película<br></label>

            <select class="custom-select">
                <option selected>Selecciona una película</option>
                
                @foreach ($peliculas as $p)
            <option value="{{$p->id}}">{{$p->titulo}}</option>
                @endforeach
                
                
              </select>

           
        </div>
       
        

        
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</form>


@endsection