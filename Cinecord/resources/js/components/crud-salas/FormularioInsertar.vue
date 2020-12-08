<template>
    <div>
    
    <div class="col-md-12">
        <a href="#" id="anadir" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create"> Insertar Nueva Sala
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <hr>




    <form enctype="multipart/form-data" @submit.prevent="guardarSalas">
    
    
    <div class="modal fade" id=create tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Nueva Sala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        
                        <div class="form-group">
                            <label for="titulo">Aforo de la sala</label>
                            <input type="number" name="imagen_promocional" class="form-control" v-model="sala.aforo">
                        </div>


                    
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de Sala</label>
                                <select v-model="sala.tipo_sala" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'Estandar'">Estandar</option>
                                <option :v-model="'3D'">3D</option>
                                
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tramo Inicial</label>
                                <select v-model="sala.tramoInicial" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'16:00'">16:00</option>
                                <option :v-model="'17:00'">17:00</option>
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tramo Final</label>
                                <select v-model="sala.tramoFinal" class="form-control" id="exampleFormControlSelect1">
                                <option :v-model="'16:00'">16:00</option>
                                <option :v-model="'17:00'">17:00</option>
                                
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
<listar-salas ref="listarSalas"></listar-salas>

</div>
</template>
<script>
import ListarSalas from './ListarSalas.vue'
export default {
components: { ListarSalas },
    data() {
        return {
            salas: [],
            
            sala: {
                aforo: '' ,tipo_sala: '',tramoInicial:'',tramoFinal: '',
            

        },
        

        
        }
    },
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
        }

    }
}
</script>
<style scoped>

</style>