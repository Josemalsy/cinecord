@extends('layouts.app')

@section('content')


<div class="container">
    <form action="{{route('salvar')}}" method='post' enctype='multipart/form-data'>
        @csrf

        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="inputGroupFile02" accept=".xml">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Elije
                    fichero xml</label>
            </div>
        </div>

        <div>
            <input class="btn btn-primary btn-lg" type="submit" value="Enviar fichero" />
        </div>
    </form>
</div>

@endsection