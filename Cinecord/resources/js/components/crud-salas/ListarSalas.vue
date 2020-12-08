<template>
<div>
    
    <h1>Listado Salas</h1>
        <table id="tabla-peliculas" class="table">
<thead class="thead-dark">
    <tr>
    <th scope="col">#Ref</th>
    <th scope="col">Aforo</th>
    <th scope="col">Tipo de Sala</th>
    <th scope="col">Tramo Inicial</th>
    <th scope="col">Tramo Final</th>
    <th scope="col">Editar/Eliminar</th>
    </tr>
</thead>
<tbody>
    <tr v-for="(item,index) in listadoSalas" :key="index">
    <th scope="row">{{item.id}}</th>
    <td>{{item.aforo}}</td>
    <td>{{item.tipo_sala}}</td>
    <td>{{item.tramoInicial}}</td>
    <td>{{item.tramoFinal}}</td>
    
    <td>
        <button class="btn btn-danger" @click="eliminarSala(item,index)">

            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>

        </button>
        <button class="btn btn-warning" @click="editarFormulario(item)">

            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>


        </button>


    </td>
    </tr>

</tbody>
</table>

<!-- <ul class="list-group">
    <li class="list-group-item" v-for="(item,index) in listadoSalas" :key="index">
        <span class="badge badge-primary float-right">Aforo : {{item.aforo}}</span>
        <label >Tipo Sala: {{item.tipo_sala}}</label>
        <label >Tramo Inicial: {{item.tramoInicial}}</label>
        <label >Tramo Final: {{item.tramoFinal}}</label>

        <button class="btn btn-danger" @click="eliminarSala(item,index)">

            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>

        </button>
        <button class="btn btn-warning" @click="editarFormulario(item)">

            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>


        </button>

        </li>
</ul> -->

<formulario-editar-sala :salaSeleccionada = "salaSeleccionada"></formulario-editar-sala>

</div>
</template>

<script>
import FormularioEditar from '../crud-salas/FormularioEditar.vue';


export default {
components: { FormularioEditar },
    
    data() {
        return {
            
        listadoSalas: '',
        salaSeleccionada: [],
        contadorSalas:0,
        
        
        }
    },

    created(){
        this.imprimirSalas();
    },


    methods: {

        eliminarSala(item,index){
        
        axios.delete(`/staff/salas/${item.id}`)
            .then(()=>{
                
                this.listadoSalas.splice(index,1);
                this.contadorSalas-=1;
                $("#totalPeliculas").text(this.contadorSalas);

            })
    },
        editarFormulario(item){

            this.salaSeleccionada = item,
            
            $("#editar").modal("show");


        },
    


    imprimirSalas(){
        axios.get('/staff/extraerSalas').then(res => {
            this.listadoSalas = res.data;
            axios.get('/staff/totalSalas').then(contador => {
            
            this.contadorSalas = contador.data;

            $("#totalSalas").text(contador.data);
        })
            
        })
        .catch(e =>{
        console.log(e);
        })
    }   
    
},
}
</script>

<style scoped>

</style>