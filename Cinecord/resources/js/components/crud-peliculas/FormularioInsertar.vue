<template>
<div>

   <div class="clearfix"></div>
   <div class="col-md-10">
        
    
        <a href="#" id="anadir" class="btn btn-primary pull-left" data-toggle="modal" data-target="#create"> Insertar Nueva Película
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <form enctype="multipart/form-data" @submit.prevent="guardarPeliculas">
    
    
    <div class="modal fade" id=create tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Película</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        
                        <div class="form-group">
                            <label for="titulo">Ruta de la imagen</label>
                            <input type="text" name="imagen_promocional" class="form-control" v-model="pelicula.imagen_promocional">
                        </div>


                    
                        <div class="form-group">
                            <label for="titulo">Titulo de la Película</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Spider Man 3" v-model="pelicula.titulo">
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="titulo">Director</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Tarantino" v-model="pelicula.director">
                        </div>

                        
                        <div id='genero'>
                            <input type="checkbox" id="Drama" name="genero" value="Drama" v-model="pelicula.genero">
                            <label for="jack">Drama</label>
                            <input type="checkbox" id="Accion" name="genero" value="Accion" v-model="pelicula.genero">
                            <label for="john">Acción</label>
                            <input type="checkbox" id="Terror" name="genero" value="Terror" v-model="pelicula.genero">
                            <label for="mike">Terror</label>
                            <input type="checkbox" id="Trhiller" name="genero" value="Thriller" v-model="pelicula.genero">
                            <label for="mike">Thriller</label>
                            <input type="checkbox" id="Suspense" name="genero" value="Suspense" v-model="pelicula.genero">
                            <label for="mike">Suspense</label>
                        
                            
                        </div>
                    
                        <div class="form-group">
                                <label for="titulo">Duración</label>
                            <input type="number" name="duracion" class="form-control"  v-model="pelicula.duracion">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sinopsis</label>
                            <textarea class="form-control" id="" name="sinopsis" rows="3" v-model="pelicula.sinopsis"></textarea>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Reparto</label>
                            <textarea class="form-control" id="" name="reparto" rows="3" v-model="pelicula.reparto"></textarea>
                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Clasificacion</label>
                                <select v-model="pelicula.clasificacion" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'Especialmente recomendada'">Especialmente recomendada</option>
                                <option :v-model="'Apta para todos los públicos'">Apta para todos los públicos</option>
                                <option :v-model="'No recomendada para menores de 12 años'">No recomendada para menores de 12 años</option>
                                <option :v-model="'No recomendada para menores de 16 años'">No recomendada para menores de 16 años</option>
                                <option :v-model="'No recomendada para menores de 18 años'">No recomendada para menores de 18 años</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="titulo">Fecha de Estreno</label>
                            <input type="date" name="fechaEstreno" class="form-control"  v-model="pelicula.fechaEstreno">
                        </div>


                        <div class="form-group">
                                <label for="titulo">Trailer</label>
                            <input type="text" name="trailer" class="form-control"  v-model="pelicula.trailer">
                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de Película</label>
                                <select v-model="pelicula.tipo_pelicula" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'Estandar'">Estandar</option>
                                <option :v-model="'3D'">3D</option>
                                
                                </select>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="sumbit" class="btn btn-primary" value="Guardar">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                
                    </div>
                    
        </div>
    </div>
        
</form>


<listar-peliculas ref="listarPeliculas"></listar-peliculas>

</div>
</template>

<script>
import ListarPeliculas from './ListarPeliculas.vue'
export default {
components: { ListarPeliculas },
    data() {
        return {
            peliculas: [],
            
            pelicula: {
                titulo: '' ,director: '',duracion:0,sinopsis: '',genero: [],
                    reparto: '',clasificacion: '', fechaEstreno: '', tipo_pelicula: '', imagen_promocional: '', trailer: '',
            

        },
        

        
        }
    },


    created(){

    


    },
    methods:{

    

    guardarPeliculas: function(){

        var url = 'subirPelicula'
        const params = {
            titulo: this.pelicula.titulo,    
            director: this.pelicula.director,
            duracion: this.pelicula.duracion,
            sinopsis: this.pelicula.sinopsis,
            genero: this.pelicula.genero,
            reparto: this.pelicula.reparto,
            clasificacion: this.pelicula.clasificacion,
            fechaEstreno: this.pelicula.fechaEstreno,
            tipo_pelicula: this.pelicula.tipo_pelicula,
            imagen_promocional: this.pelicula.imagen_promocional,
            trailer: this.pelicula.trailer,
        }
        
        this.limpiarFormulario();

        
        axios.post('/staff/cartelera/subirPelicula/',params)
            .then(res => {
                console.log(res.data);
                this.peliculas.push(res.data)
                $("#create").modal("hide");
                this.$refs.listarPeliculas.listarPeliculas();
                
                
                
                
            }).catch((e) => {
                console.log(e);
            })
            

    },

    limpiarFormulario: function(){
        this.pelicula.titulo = '',    
        this.pelicula.director = '',
        this.pelicula.duracion = '',
        this.pelicula.sinopsis = '',
        this.pelicula.genero = '',
        this.pelicula.reparto = '',
        this.pelicula.clasificacion = '',
        this.pelicula.fechaEstreno = '',
        this.pelicula.tipo_pelicula = '',
        this.pelicula.imagen_promocional = '',
        this.pelicula.trailer = ''
    }
    
    },


}
</script>

<style lang="stylus" scoped>

</style>