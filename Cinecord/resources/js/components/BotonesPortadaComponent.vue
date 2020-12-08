<template>
        <div>

            <a href="#" class="btn btn-primary col-md-4 botonesInteractivos" id="compraEntrada">Compra tu entrada</a>
            <a href="#" v-show="valoracion==false && logueado.id > 0" class="btn btn-success col-md-4 botonesInteractivos" id="Botonvaloracion" v-on:click="escribirValoracion">Escribe tu reseña</a>
            <a href="#" type="button" v-show="botonVideo" id="botonYoutube" v-on:click="desactivarSinopsis" class="btn btn-yt youtube col-md-3"><i class="fab fa-youtube pr-1"></i></a>
            <button class="btn btn-warning col-md-3" v-show="sinopsis==false" v-on:click="activarSinopsis">Ver sinopsis </button>
            <button id="verValoracion" v-show="muestraValoraciones==false" class="btn btn-block btn-info bloque" v-on:click="verValoraciones">Ver valoraciones</button>  
            <button id="cierre" class="btn btn-dark btn-block text-white bloque" data-dismiss="modal" v-on:click="activarSinopsis">Cerrar</button>

        </div>
</template>


<script>

    export default{
        data(){
            return{
                
            }
        }
    }


</script>


<style>

</style>