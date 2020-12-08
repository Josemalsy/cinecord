@extends('layouts.app')

@section('content')

<form method="GET" action="{{ route('peliculas.extraerSesiones') }}">

    @csrf

    <div class="container">

        <h1>Asignar Películas a salas</h1>

        <div class="form-group">

            <label for="titulo">Seleccionar Película</label>

            <select id="pelicula" class="custom-select">
                <option selected>Selecciona una película</option>
                
                @foreach ($peliculas as $p)
                    <option id="{{$p->id}}" value="{{$p->id}}">{{$p->titulo}}</option>
                @endforeach
                
                
              </select>

           
        </div>


        {{-- Fecha --}}

        <div class="row">
            <div class="form-group col-md-12" id="ffecha">
                <label for="titulo">Seleccionar Fecha</label>
                <input id="fecha" name="setFechaElegida" type="date" placeholder="Fecha Cita"
                    class="form-control">

            </div>
        </div>
        

        {{-- SELECCIONAR SALAS --}}

        <div class="form-group" id="sala" style="display:none">
            <label for="titulo">Seleccionar Salas</label></br>
            
                @foreach ($salas as $s)

                <button id="{{"Sala_$s->id"}}" type="button" class=" botones_sala btn btn-warning" data-toggle="modal" data-target="{{"#modal-".$s->id}}">
                    {{"Sala ".$s->id}}
                    <input id="'tramo-{{$s->id}}+tramoInicial'" type="hidden" value="{{$s->tramoInicial}}">
                    <input id="'tramo-{{$s->id}}+tramoFinal'" type="hidden" value="{{$s->tramoFinal}}">
                </button>
                <!-- Modal -->

            <div class="modal fade" name="modal-{{$s->id}}" id="{{"modal-".$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tramos Disponibles Sala {{$s->id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            {{-- EN ESTA PARTE SE CARGARAN LOS TRAMOS DE CADA SALA --}}
                            <div class="form-group col-md-12" id="{{"Sala-".$s->id}}">

                            </div> 
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-info" style="color:white" data-dismiss="modal">Limpiar Filtros</button>
                        
                    </div>
                    </div>
                    </div>
                </div>
                @endforeach

                
                
                
        </div>
       
        

                
            
        <button type="submit" class="btn btn-primary">Insertar Sesión</button>
           
        </div>
        
        
       
        

        
       

    </div>

</form>
{{-- Scripts --}}
<script src="{{ asset('/js/crearBotones.js') }}"></script>

@endsection