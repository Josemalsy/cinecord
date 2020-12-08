<template>
<div>
    
    <form enctype="multipart/form-data" @submit.prevent="editarPelicula(peliculaSeleccionada)">
    
    
    <div class="modal fade" id=editar tabindex="-1" role="dialog" >
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
                            <input type="text" name="imagen_promocional" class="form-control" v-model="peliculaSeleccionada[1]">
                        </div>


                    
                        <div class="form-group">
                            <label for="titulo">Titulo de la Película</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Spider Man 3" v-model="peliculaSeleccionada[2]">
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="titulo">Director</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Tarantino" v-model="peliculaSeleccionada[3]">
                        </div>

                        <div id='genero'>
                            <select class="form-control" v-model="peliculaSeleccionada[5]">
                                <option :v-model="'Drama'">Drama</option>
                                <option :v-model="'Acción'">Acción</option>
                                <option :v-model="'Terror'">Terror</option>
                                <option :v-model="'Thriller'">Thriller</option>
                                <option :v-model="'Suspense'">Suspense</option>
                                </select>
                        
                            
                        </div>
                    
                        <div class="form-group">
                                <label for="titulo">Duración</label>
                            <input type="number" name="duracion" class="form-control" placeholder="Tarantino" v-model="peliculaSeleccionada[4]">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sinopsis</label>
                            <textarea class="form-control" id="" name="sinopsis" rows="3" v-model="peliculaSeleccionada[7]"></textarea>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Reparto</label>
                            <textarea class="form-control" id="" name="reparto" rows="3" v-model="peliculaSeleccionada[6]"></textarea>
                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Clasificacion</label>
                                <select v-model="peliculaSeleccionada[8]" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'Especialmente recomendada'">Especialmente recomendada</option>
                                <option :v-model="'Apta para todos los públicos'">Apta para todos los públicos</option>
                                <option :v-model="'No recomendada para menores de 12 años'">No recomendada para menores de 12 años</option>
                                <option :v-model="'No recomendada para menores de 16 años'">No recomendada para menores de 16 años</option>
                                <option :v-model="'No recomendada para menores de 18 años'">No recomendada para menores de 18 años</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="titulo">Fecha de Estreno</label>
                            <input type="date" name="fechaEstreno" class="form-control"  v-model="peliculaSeleccionada[9]">
                        </div>


                        <div class="form-group">
                                <label for="titulo">Trailer</label>
                            <input type="text" name="trailer" class="form-control"  v-model="peliculaSeleccionada[11]">
                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de Película</label>
                                <select v-model="peliculaSeleccionada[10]" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'Estandar'">Estandar</option>
                                <option :v-model="'3D'">3D</option>
                                
                                </select>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="sumbit" class="btn btn-primary" value="Editar">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                
                    </div>
                    
        </div>
    </div>
        
</form>

</div>
</template>

<script>
// import ListarPeliculas from './ListarPeliculas.vue'
export default {
// components: { ListarPeliculas },
    data() {
        return {
            
        
        
        
        
        }
    },

    props:['peliculaSeleccionada'],
    

    created(){
    
        

    },

    methods:{

        editarPelicula(peliculaSeleccionada){
            
            
        const params = {
            imagen_promocional: this.peliculaSeleccionada[1],
            titulo: this.peliculaSeleccionada[2],    
            director: this.peliculaSeleccionada[3],
            duracion: this.peliculaSeleccionada[4],
            genero: this.peliculaSeleccionada[5],
            reparto: this.peliculaSeleccionada[6],
            sinopsis: this.peliculaSeleccionada[7],
            clasificacion: this.peliculaSeleccionada[8],
            fechaEstreno: this.peliculaSeleccionada[9],
            tipo_pelicula: this.peliculaSeleccionada[10],
            trailer: this.peliculaSeleccionada[11]
            
        }

        
        axios.put(`/staff/peliculas/${peliculaSeleccionada[0]}`,params)
            .then(res=>{
                
                $("#editar").modal("hide");
                
                // Buscamos el index que hemos modificado.
                // const index = this.$refs.listarPeliculas.findIndex(
                //     buscandoPelicula => buscandoPelicula.id === res.data.id)

                //     this.peliculas[index] = res.data;
                    // this.$refs.listarPeliculas.listarPeliculas();
                    // console.log(this.$refs.listarPeliculas.listarPeliculas())
        
            }).catch((e) => {
                console.log(e);
            })
            
        



    },


    },
}
</script>
<style scoped>

</style>