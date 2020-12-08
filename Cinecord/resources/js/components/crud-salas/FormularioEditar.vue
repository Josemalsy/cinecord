<template>
    <div>
    <form enctype="multipart/form-data" @submit.prevent="editarSala(salaSeleccionada)">
    
    
    <div class="modal fade" id="editar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Sala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        
                        <div class="form-group">
                            <label for="titulo">Aforo de la sala</label>
                            <input type="number" name="imagen_promocional" class="form-control" v-model="salaSeleccionada.aforo">
                        </div>


                    
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de Sala</label>
                                <select v-model="salaSeleccionada.tipo_sala" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'Estandar'">Estandar</option>
                                <option :v-model="'3D'">3D</option>
                                
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tramo Inicial</label>
                                <select v-model="salaSeleccionada.tramoInicial" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'16:00'">16:00</option>
                                <option :v-model="'17:00'">17:00</option>
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tramo Final</label>
                                <select v-model="salaSeleccionada.tramoFinal" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'16:00'">16:00</option>
                                <option :v-model="'17:00'">17:00</option>
                                
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

export default {

    data() {
    
    },
    props:['salaSeleccionada'],

    created(){

    },
    methods:{

        guardarSalas: function(){
            var url = 'subirSala'
            
            const params = {
                aforo: this.sala.aforo,
                tipo_sala: this.sala.tipo_sala,
                tramoInicial: this.sala.tramoInicial,
                tramoFinal: this.sala.tramoFinal,
            }
            this.limpiarFormulario();

            axios.post(url,params)
            .then(res => {
                console.log(res.data);
                this.salas.push(res.data)
                this.$refs.listarSalas.imprimirSalas();
                // console.log("CONSOLE.LOG-->"+this.$refs.listarPeliculas.listarPeliculas);
                // this.$refs.listarPeliculas.listarPeliculas();
                $("#create").modal("hide");
                
                // $("#totalPeliculas").text("999");
                
                
            }).catch((e) => {
                console.log(e);
            })



        },
        limpiarFormulario: function(){
            this.sala.aforo = '',    
            this.sala.tipo_sala = '',
            this.tramoInicial = '',
            this.tramoFinal = ''
        },
        editarSala: function(salaSeleccionada){

            const params = {
                aforo: this.salaSeleccionada.aforo,
                tramoInicial: this.salaSeleccionada.tramoInicial,
                tramoFinal: this.salaSeleccionada.tramoFinal,
                tipo_sala:this.salaSeleccionada.tipo_sala,
            }

            axios.put(`/staff/salas/${salaSeleccionada.id}`,params)
            .then(res=>{
                console.log(res.data);
                $("#editar").modal("hide");
                // Buscamos el index que hemos modificado.
                // const index = this.$refs.listarPeliculas.findIndex(
                //     buscandoPelicula => buscandoPelicula.id === res.data.id)

                //     this.peliculas[index] = res.data;
                    // this.$refs.listarPeliculas.listarPeliculas();
                    // console.log(this.$refs.listarPeliculas.listarPeliculas())
        
            })

        }

    }
}
</script>
<style scoped>

</style>