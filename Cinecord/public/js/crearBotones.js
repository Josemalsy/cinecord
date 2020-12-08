var contador = 0;
var click1="";
var click2 = "";


window.addEventListener("load", () => {

    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("setFechaElegida")[0].setAttribute('min', today);
    
    
    
    xmlHttp = new XMLHttpRequest();
    
    cambiarFecha();
    
    
    });

function cambiarFecha(){
          
    $("#")

        
          
      }
function sesiones(){
      



        
      }


//Carga los diferentes tramos horarios que tiene una sala
function cargarBotonesSalas(){
   
    let totalSalas = $( ".botones_sala" ).length;
    
   
    for (let index = 1; index <= totalSalas; index++) {
        
        
            crearBotones(index)
        
  }

}

//Crea los tramos horarios de cada
function crearBotones(salaSeleccionada) {
    
    
    tramosHoraSeleccionada =   "Sala_"+salaSeleccionada;
    $('#Sala-'+salaSeleccionada).empty();
    
    let tramoInicial = $("#"+tramosHoraSeleccionada+"  input:eq(0)").val();
    console.log("Tramo Inicial "+tramoInicial);
    let tramoFinal = $("#"+tramosHoraSeleccionada+"  input:eq(1)").val();
    console.log("Tramo Final "+tramoFinal);
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
    
    // console.log($("#Sala-"+salaSeleccionada+" ~ div > div > div:eq(1) > div:eq(1) > div:eq(0)"));
    
    
    for (let index = 0; index <= botones; index++) {        
        
        
        if (minutosIniciales > 45) {
    
            horaInicial += 1;
            minutosIniciales = 0;
            $("#Sala-"+salaSeleccionada).append("<button v-model='"+ horaInicial + ':00' + "' type='button' id="+'Sala-'+salaSeleccionada+'_tramo' + index + " class='botoncitos btn  btn-primary mr-1 mb-1'>" + horaInicial + ":00" + " </button>");
            
            minutosIniciales += 60;
        } else {
            if (minutosIniciales == 0) {
    
                $("#Sala-"+salaSeleccionada).append("<button  v-model='"+ horaInicial + ':00' + "' type='button'  id="+'Sala-'+salaSeleccionada+'_tramo' + index + "  class='botoncitos btn citas btn-primary mr-1 mb-1' >" + horaInicial + ":00" + "</button>")
                minutosIniciales += 60;
                
            } else {
    
                $("#Sala-"+salaSeleccionada).append("<button  v-model='" + horaInicial + ":" + minutosIniciales + "' type='button'  id="+'Sala-'+salaSeleccionada+'_tramo' + index + "  class='botoncitos btn  btn-primary mr-1 mb-1 ' >" + horaInicial + ":" + minutosIniciales + "  </button>")
                minutosIniciales += 60;
                
            }
    
        }
    
    
    }
        $("#botonesFooter_"+salaSeleccionada).append('<button id="boton_'+salaSeleccionada+'" type="button" class="btn btn-info"  disabled="disabled">Limpiar Tramos</button>')
        tramoSeleccionado();
        
    }

function tramoSeleccionado(){
  
  let posicion = 0;
  let totalBotones = 0;
  let hora = 0;
    for(let i = 0; i<=10;i++){
        for(let j=0; j<=10; j++){
            $("#Sala-"+i+"_tramo"+j).on("click",function(){
                caracter = $(this).attr("id").indexOf("-");
                caracterDos = $(this).attr("id").indexOf("_");
                
                hora = $("#Sala-"+i+"_tramo"+j);
                posicion = $(this).attr("id").slice(caracter+1, caracterDos);
                totalBotones = $("#Sala-"+posicion).find(".botoncitos").length
                switch(contador){
                    case 0:
                    click1 = $("#Sala-"+i+"_tramo"+j);
                    click1.toggleClass("btn-success");
                    
                    horaElegida(click1,totalBotones,posicion);
                    contador = contador+1;
                    


                        break;
                    case 1:
                        click2 = $("#Sala-"+i+"_tramo"+j);
                        click2.toggleClass("btn-success");
                        horaElegida(click2,totalBotones,posicion);
                        contador = 0;
                        break;
                    
                
            }

     
                   
                
                    
                    

              });
              
             
              
             }
            
        }
            
        
            }   


 function cargarSesiones(peliculas_sesiones){
    let totalBotones=0;
    let totalSalas = $(".botones_sala").length;
    
    let totalSesiones = Object.keys(peliculas_sesiones).length;
    
    //Bucle for que recorre las sesiones que hay para la fecha indicada
    for(let i=0; i<totalSesiones;i++){       

        for (let k=1; k<totalSalas;k++){
            
            totalBotones = $("#Sala-"+k).find(".botoncitos").length
        
            
        }
        
        if(totalBotones>0){
            for(let j=1; j<=totalBotones; j++){
   
                if($("#Sala-"+peliculas_sesiones[i].sala_id+"_tramo"+j).val()+":00"==peliculas_sesiones[i].hora){
                   
                    $("#Sala-"+peliculas_sesiones[i].sala_id+"_tramo"+j).addClass("btn-success bd");

                    let caracter = $("#Sala_"+peliculas_sesiones[i].sala_id).attr("id").indexOf("_",0);
   
                    let posicion = $("#Sala_"+peliculas_sesiones[i].sala_id).attr("id").substr(caracter+1);

                    horaElegida($("#Sala-"+peliculas_sesiones[i].sala_id+"_tramo"+j),totalBotones,posicion);
                }
            
               
            }
        
        }
        
        }
    
    
    
 }

function horaElegida(hora,totalBotones,posicion){

   

   let duracion = $( "#pelicula option:selected" ).attr('duracion');



   
   
   const d = duracion;

    let horaElegidaTramo = hora.val().substr(0,2);
    let minutoElegidoTramo = hora.val().substr(3,5);
    let horaFinalTramo = horaSuperior(horaElegidaTramo,minutoElegidoTramo,d);
    let horaAnteriorTramo = horaInferior(horaElegidaTramo,minutoElegidoTramo,d);
    


    console.log(hora);

    for(let i=0; i<totalBotones;i++){


       
      

        if(hora.hasClass("btn-success") ){
            hora.attr("disabled",true);
            
                if($("#Sala-"+posicion+"_tramo"+i).val()>horaAnteriorTramo && $("#Sala-"+posicion+"_tramo"+i).val()<horaFinalTramo){
                    if(!$("#Sala-"+posicion+"_tramo"+i).hasClass("btn-success")){
                    $("#Sala-"+posicion+"_tramo"+i).hide();
                    }
                    
            }
        }
        hora.addClass("btn-success");

        }
        botonesSeleccionados = $("#Sala-"+posicion).find(".btn-success").length

        if(botonesSeleccionados>0){
            $("#boton_"+posicion).attr("disabled",false);
            $("#registrarTramos").on("click",function(e){
                e.preventDefault();
            })
            $("#boton_"+posicion).on("click", function(){
                limpiarTramos(posicion,totalBotones,hora);
            })
            
            
        }
        
        
       
    }

    function enviarTramos(){
        alert("Aloja");
    }

   function limpiarTramos(posicion,totalBotones,hora){


    for (let index = 0; index < totalBotones; index++) {
        
        if(!$("#Sala-"+posicion+"_tramo"+index).hasClass("bloqueados")){
        $("#Sala-"+posicion+"_tramo"+index).removeClass("btn-success").attr("disabled",false).show();
        $("#boton_"+posicion).attr("disabled",true);
    }
}
    

   }

   function horaSuperior(hora_M,minuto_M,duracion){

    const d = duracion;
    

    minuto_M = parseInt(minuto_M);
    duracion = parseInt(duracion);

    
while(duracion >=60){
    duracion += minuto_M;
    minuto_M = 0;
    hora_M = parseInt(hora_M) + 1;
    
    duracion -=60;
   
}
   
minuto_M+=minuto_M;
    
    
    if(minuto_M<10){
        
        minuto_M = 0 + minuto_M.toString();
        
    }
    
    let  horaFinal = hora_M+":"+minuto_M;
    duracion = d;
    console.log("Hora Final Elegida ---> "+horaFinal);
    return horaFinal;
    
    

   }

   function horaInferior(hora_M,minuto_M,duracion){

    const d = duracion;
    

    minuto_M = parseInt(minuto_M);
    duracion = parseInt(duracion);

    
while(duracion >=60){
    duracion -= minuto_M;
    minuto_M = 0;
    hora_M = parseInt(hora_M) - 1;
    
    duracion -=60;
   
}
   
minuto_M-=minuto_M;
    
    
    if(minuto_M<10){
        
        minuto_M = 0 + minuto_M.toString();
        
    }
    
    let  horaFinal = hora_M+":"+minuto_M;
    console.log("Hora Inicial Elegida ---> "+horaFinal);
    duracion = d;
    return horaFinal;
    
    

   }
