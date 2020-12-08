
@extends('layouts.app')
@section('content')
<div class="container">

    <div id="pruebaVue" class="row">
        <div class="col-xs-12">

            <h1 class="page-header"> CRUD Laravel & VUEjs</h1>
        </div>
        <div class="col-sm-7">

            <a href="#" class="btn btn-primary pull-right">Nueva tarea</a>

            <table class="table table-hover table-sprite">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>titulo</th>
                        <th>director</th>
                        <th>duracion</th>
                        <th>genero</th>
                        <th>reparto</th>
                        <th>sinopsis</th>
                        <th>clasificacion</th>
                        <th>tipo_pelicula</th>
                        <th>estado</th>
                        <th>imagen_promocional</th>
                        <th>trailer</th>
                        
                    </tr>

                </thead>
                <tbody>
                    <tr v-for="keep in keeps">
                        <td width="10">@{{keep}}</td>
                    </tr>
                </tbody>

            </table>

        </div>
        <div class="col-sm-5">
            <pre>
            </pre>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
    <script src="{{ asset('/vue/vue.js') }}"></script>
    <script src="{{ asset('/js/scriptPrueba.js') }}"></script>
</div>
@endsection


