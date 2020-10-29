@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('peliculas.store') }}">

    @csrf

    <div class="container">

        <h1>Asignar Películas a salas</h1>

        <div class="form-group">

            <label for="titulo">Seleccionar Película</label>

            <select id="pelicula" class="custom-select">
                <option selected>Selecciona una película</option>
                
                @foreach ($peliculas as $p)
            <option name="" value="{{$p->id}}">{{$p->titulo}}</option>
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

                <button id="{{$s->id}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="{{"#modal-".$s->id}}">
                    {{"Sala ".$s->id}}
                    <input id="tramoInicial" type="hidden" value="{{$s->tramoInicial}}">
                    <input id="tramoFinal" type="hidden" value="{{$s->tramoFinal}}">
                </button>
                <!-- Modal -->

            <div class="modal fade" id="{{"modal-".$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tramos Disponibles</h5>
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
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach

                <div id="main">
                    <div class="row">
                        <div class="col-sm-4">
                            <h1>Lista Vuejs - Ajax</h1>
                            <ul class="list-group">
                                <li v-for="item in lists" class="list-group-item">
                                    @{{item.id}}
                                </li>
                            </ul>
                        </div>
                        
                    </div>
            
            
            
                </div>
                
                           
        </div>
                
            
        <button type="submit" class="btn btn-primary">Insertar Sesión</button>
           
        </div>
        
        
       
        

        
       

    </div>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
<script>

window.addEventListener("load", () => {

    
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("setFechaElegida")[0].setAttribute('min', today);
           

xmlHttp = new XMLHttpRequest();




cambiarFecha();
seleccionarSala();

cambiarPelicula();
cargarSesiones();
});


function cambiarFecha(){
    
    $("#fecha").on("change",function(){

        $("#sala").show();
       
    })


}

function cambiarPelicula(){
    
    $("#pelicula").on("change",function(){
        $("#fecha").val('');
        $("#sala").hide();
        

})



}

function seleccionarSala(){

    let salaSeleccionada;

    for (let index = 0; index <= 10; index++) {

        $("#"+index).on("click",function(){
            
       crearBotones(index);

 })


    }

    
}

function cargarSesiones(){

    let fechaSeleccionada = "2020-10-29";
    let sala = "1";
    $.ajax({
            url: "extraerSesiones",
            type: "POST",
            data: {
                sala_id:sala,
                fecha:fechaSeleccionada,
                _token:$('input[name="_token"]').val()
            },
            dataType: "json"



        }).done(function (responseText) {

            $(responseText).each((ind, ele) => {
                formatoHora = ele.hora.substr(0, 2) + "" + ele.hora.substr(2, 3);
                
                console.log($("#Sala-1 > button:eq(0)").val())


            })

        })
            
    
    }
function crearBotones(salaSeleccionada) {

tramosHoraSeleccionada =   "Sala-"+salaSeleccionada;

/**
 * 
 * Para crear los botones , he hecho lo siguiente , he sacado el tramo inicial y el tramo final por ejemplo 
 * 
 * Tramo Inicial 12:00         |   Tramo final 15:00
 * Hay 3 horas entre los tramos, como cada boton se crea cada 15 minutos pues (3*60)/15 = 12 botones.
 * 
 *  PD: Seguramente se pueda hacer muchisimo pero muchisimo más facil, soy experto en complicarme la vida xD
 * 
 */


//  Limpio los horarios disponibles de la sala seleccionada
 $('#'+tramosHoraSeleccionada).empty();

let tramoInicial = $("#"+salaSeleccionada+"  input:eq(0)").val();
console.log(tramoInicial);
let tramoFinal = $("#"+salaSeleccionada+"  input:eq(1)").val();
console.log(tramoFinal);
let horasComprendidas;
let botones;
let tramoInicialInt = parseInt(tramoInicial);
let tramoFinalInt = parseInt(tramoFinal);

horasComprendidas = (tramoFinalInt - tramoInicialInt);
botones = (horasComprendidas * 60) / 60;

let horaInicial = tramoInicial.substr(0, 2)
let minutosIniciales = tramoInicial.substr(3);

horaInicial = parseInt(horaInicial);
minutosIniciales = parseInt(minutosIniciales);

console.log($("#"+salaSeleccionada+" ~ div > div > div:eq(1) > div:eq(1) > div:eq(0)"));


for (let index = 0; index <= botones; index++) {

    // alert("Hora inicial de la sala clicada: "+salaSeleccionada+" "+horaInicial+":"+minutosIniciales);
    
    
    
    if (minutosIniciales > 45) {

        horaInicial += 1;
        minutosIniciales = 0;
        $("#"+tramosHoraSeleccionada).append("<button value='" + horaInicial + ':00' + "' type='button' id=cita" + index + " class='botoncitos btn  btn-primary mr-1 mb-1'>" + horaInicial + ":00" + " </button>");

        minutosIniciales += 60;
    } else {
        if (minutosIniciales == 0) {

            $("#"+tramosHoraSeleccionada).append("<button  value='" + horaInicial + ':00' + "' type='button'  id=cita" + index + "  class='botoncitos btn citas btn-primary mr-1 mb-1' >" + horaInicial + ":00" + "</button>")
            minutosIniciales += 60;

        } else {

            $("#"+tramosHoraSeleccionada).append("<button  value='" + horaInicial + ":" + minutosIniciales + "' type='button'  id=cita" + index + "  class='botoncitos btn  btn-primary mr-1 mb-1 ' >" + horaInicial + ":" + minutosIniciales + "  </button>")
            minutosIniciales += 60;
        }



    }


}



}



</script>
@endsection