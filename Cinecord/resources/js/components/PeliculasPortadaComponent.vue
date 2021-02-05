<template>
  <div class="row col-md-12">
    <div class="row container col-md-2 filtros">
      <sidebar @busq="busqTitulo = $event" @busqueda="busqGenero = $event"> </sidebar>
    </div>       

    <div class="row col-md-10 caja">

      <div class="tarjeta" v-for="(pelicula,index) in buscaPelicula" :key="index" data-toggle="modal" :data-target="'#modal-'+pelicula.id"> 

        <div class="wrapper">
          <img class="img-fluid." :src="pelicula.imagen_promocional">
        </div>
            <p>{{pelicula.titulo}}</p>
            <small>{{pelicula.duracion}} largos minutos demasiados<small>
                 
        </div>  

      </div>
      <div class="container">
        <div class="modal fade" v-for="(pelicula,index) in buscaPelicula" :key="index" :id="'modal-'+pelicula.id" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">{{pelicula.titulo}}</h5>
                  <span class="generos">{{pelicula.genero}}</span>
                  
                </div>
            <div class="modal-body" v-if="sinopsis">   
              <p class="sinopsis">Sinopsis</p>
                <hr/>
              <p class="parrafo">{{pelicula.sinopsis}}</p>        
              <p class="sinopsis">Reparto</p>
                <hr/>
              <div class="reparto">              
                    {{pelicula.reparto}}
              </div>              
            </div>
            <div class="modal-body" v-else-if="muestraValoraciones==true">

              <valoracion :muestraValoraciones="muestraValoraciones" :id_pelicula="pelicula.id"></valoracion>

            </div>

            <div class="modal-body" v-else-if="escribeValoracion==true && comprValoracion">

              <h3>Opina sobre {{pelicula.titulo}}</h3>
              <valoracion :id_pelicula="pelicula.id" :user_id="logueado.id" :escribeValor="escribeValoracion"  @comprueba="comprValoracion = $event" />
            
            </div>

            <div class="modal-body" v-else-if="botonVideo==false && comprValoracion">
              <div class="container">
                <iframe :src="pelicula.trailer" width="100%" height="500"></iframe>             
              </div>
            </div>
            <div class="modal-footer col-md-12 row">
              <button class="btn btn-primary col-md-4" id="compraEntrada">Compra tu entrada</button>
              <button v-show="valoracion==false && logueado.id > 0" class="btn btn-success col-md-4" id="Botonvaloracion" v-on:click="escribirValoracion">Escribe tu reseña</button>
              <button type="button" v-show="botonVideo" id="botonYoutube" v-on:click="desactivarSinopsis" class="btn btn-yt youtube col-md-3"><i class="fab fa-youtube pr-1"></i></button>
              <button class="btn btn-warning col-md-3" v-show="sinopsis==false" v-on:click="activarSinopsis">Ver sinopsis </button>
              <button id="verValoracion" v-show="muestraValoraciones==false" class="btn btn-block btn-info bloque" v-on:click="verValoraciones">Ver valoraciones</button>  
              <button id="cierre" class="btn btn-dark btn-block text-white bloque" data-dismiss="modal" v-on:click="activarSinopsis">Cerrar</button>               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</template>



<!-- --------------------------------------------------------------------------------------------------------------------------------->

<!-- SCRIPT -->


<script>

let user = document.head.querySelector('meta[name="user"]').content.indexOf("id");

if( user !== -1){
   user = JSON.parse(document.head.querySelector('meta[name="user"]').content) ;
}else if(user == -1){
  user = { "id": 0 };
}

    export default {
    data() {    
        return {
            peliculas: [],
            ventana: false,
            lists: [],
            valoraciones: '',
            busqTitulo: '',
            busqGenero: '',
            sinopsis: true,
            valoracion: false,
            botonVideo: true,
            muestraValoraciones: false,
            escribeValoracion: false,
            idUser: this.$attrs.iduser,
            logueado: user,
            comprValoracion: true,
            criticas: [],
        } 
        
                  
    },
    created(){
        axios.get('peliculasPortada').then(res => {         
            this.peliculas = res.data;
        })
    },
    methods: {
        desactivarSinopsis(){
            this.sinopsis = false;
            this.valoracion = false;
            this.botonVideo = false;
            this.muestraValoraciones = false;
            this.escribeValoracion = false;
            this.comprValoracion = true;
        },
        activarSinopsis(){
          this.sinopsis = true;
          this.valoracion = false;
          this.botonVideo = true;
          this.muestraValoraciones = false;
          this.escribeValoracion = false;  

        },
        escribirValoracion(){
          this.valoracion = true;
          this.sinopsis = false;
          this.botonVideo = true;
          this.muestraValoraciones = false;
          this.escribeValoracion = true;
          this.comprValoracion = true;
        },
        verValoraciones(){
          this.muestraValoraciones = true;
          this.valoracion = false;
          this.sinopsis = false;
          this.botonVideo = true;
          this.escribeValoracion = false;
        },
        valoracionMedia(id_pelicula){
          
          axios.get('critica/mediavaloracion/'+'{'+1+'}').then(res => {
            this.valoraciones = res.data;
            
            })
        }
    },
    computed: {
            buscaPelicula: function (){
                return this.peliculas.filter((item)  =>  
                item.titulo.toLowerCase().includes(this.busqTitulo) 
                && item.genero.toLowerCase().includes(this.busqGenero) 
                || item.titulo.includes(this.busqTitulo) 
                && item.genero.toLowerCase().includes(this.busqGenero)      
                );                   
            },
        }
    }
</script>




<!-- --------------------------------------------------------------------------------------------------------------------------------->

<!-- ESTILO -->

<style>

.caja{
  height: 5%
}

.tarjeta {
  width: 15%;
  border: gray 1px solid;
  margin: 5px;  
  
}

.tarjeta img{
  width: 100%;
  height: 200px;
  
}

.modal-header{
    background-color: #d9d9d9; 
    background-image: url("https://thumbs.dreamstime.com/b/marco-de-la-tira-de-la-pel%C3%ADcula-de-35m-m-822242.jpg");
    background-position: center;
    background-size: 100% 100%;
}

.modal-title{
    margin-left: 5px;
}

.modal .generos{
    text-align: left;
    font-size: 12px;
    margin: auto 5px;
}

hr {
  margin-top: -1rem;
  margin-bottom: 28px;
  width: 15%;
  float:left;
  border: 0;
  border-top: 2px solid rgba(0, 0, 0, 0.2);
}


.modal-footer{
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.bloque{  
    display:block;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

#verSinopsis{
    float: right;
    background-color: #0d0d0d;
    color: white;
    padding: 0px;

}

.youtube  {
  background-color:red;
  background: red;
  color: white;
  
}


.sidebar{       
        float:left;
        margin: 0 1% 0 1px;
        align-content: left;
        padding: 0 5% 0 0;
}


</style>