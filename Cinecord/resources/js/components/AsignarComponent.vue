<template>

<form @submit="sesiones">

    

    <div class="container">
       
        <h1>Asignar Películas a salas</h1>

        <div class="form-group">

            <label for="titulo">Seleccionar Película</label>

            <select  id="pelicula" class="custom-select">
                <option selected>Selecciona una película</option>
                
                
            <option v-for="(pelicula,index) in peliculas" :key="index" :id="pelicula.id" :duracion="pelicula.duracion" :value=pelicula.id>{{pelicula.titulo}}</option>
               
                
                
              </select>

           
        </div>
        

        <!-- Fecha -->

        <div class="row">
            <div  class="form-group col-md-12" id="ffecha">
                <label for="titulo">Seleccionar Fecha</label>
                <input  @change="cambiarFecha()" v-model="fecha"  id="fecha" name="setFechaElegida" type="date" placeholder="Fecha Cita"
                    class="form-control">

            </div>
        </div>

        <!-- Salas -->
        
        <div v-if="fecha!=''"  class="form-group" id="sala">
            
            <label for="titulo">Seleccionar Salas</label><br>
            
            <div  v-for="(sala,index) in salas" :key="index">
            
                <button   :id="'Sala_'+sala.id" type="button" class=" botones_sala btn btn-warning" data-toggle="modal" :data-target="'#modal-'+sala.id">{{"Sala"+sala.id}}

                    <input :id="'tramo-'+sala.id+'tramoInicial'" type="hidden" :value=sala.tramoInicial>
                    <input :id="'tramo-'+sala.id+'tramoInicial'" type="hidden" :value=sala.tramoFinal>

                </button>
           <!-- Modal -->
                <div class="modal fade" :name="'modal-'+sala.id" :id="'modal-'+sala.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{"Tramos disponibles Sala "+sala.id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form-group col-md-12" :id="'Sala-'+sala.id">

                            </div> 
                            
                        </div>
                        <div :id="'botonesFooter_'+sala.id" class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                        </div>
                    </div>
                    </div>
                </div>
                </div>
        </div>
        <input type="submit" id="enviar" value="Enviar">
    </div>

</form>
</template>

<script>

export default {
  data() {
    return {
      peliculas: [],
      salas: [],
      fecha: '',
      sala_id: '',
      peliculas_sesiones: [],
      
    }
  },
  created(){
    axios.get('cargarPeliculas').then(res=>{
        
      this.peliculas = res.data;
    }),
    axios.get('cargarSalas').then(res=>{
        
      this.salas = res.data;
      
      
      
  })
  },
  methods:{
      cambiarFecha(){
          axios.get('extraerSesiones', {
             params: {
            'fechaSeleccionada': this.fecha
             
            }
            }). then(res=>{
                  // this.peliculas_sesiones = res.data 
                  
                cargarSesiones(res.data);
                  
                  }
            
            )
             cargarBotonesSalas();

        
          
      },
      sesiones(){
      
        
      }
  }
  
  }
  

</script>
