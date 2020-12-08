

window.addEventListener("load", () => {

    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("setFechaElegida")[0].setAttribute('min', today);
               
    
    xmlHttp = new XMLHttpRequest();
    
    
    
    
    
    seleccionarSala();
    
    cambiarPelicula();
    cambiarFecha();
    });
    
    
    function cambiarFecha(){
        
        $("#fecha").on("change",function(){
    
           
            cargarSesiones();
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
        
        let fechaSeleccionada = $("#fecha").val();
        let datos =  {
                    
            fecha:fechaSeleccionada,
            _token:$('input[name="_token"]').val(),
        }

        
        $.ajax({
                url: "extraerSesiones",
                type: "POST",
                data:datos,
                dataType: "json",
            })
            .done(function (respuesta) {
                var sesiones = JSON.parse(respuesta);
                $(sesiones).each((ind, ele) => {
                    alert(ele.hora)
                    
                    formatoHora = ele.hora.substr(0, 2) + "" + ele.hora.substr(2, 3);
                    alert(formatoHora);
                    $("[value='" + formatoHora + "']").addClass("btn btn-danger").attr('disabled', 'disabled');
    
    
                })
        
        
                }).fail(function (responseXML, xmlStatus, xhr) {

                    alert("Has fallado");
                
    
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