<template>

<div>
    <head>
        
    </head>
    
    <h1>Listado Películas</h1>
    <table id="tabla-peliculas" class="table">
<thead class="thead-dark">
    <tr>
    <th scope="col">#Ref</th>
    <th scope="col">Titulo</th>
    <th scope="col">Duración</th>
    <th scope="col">Fecha de Estreno</th>
    <th scope="col">Editar/Eliminar</th>
    </tr>
</thead>
<tbody>
    <tr v-for="(item,index) in listadoPeliculas" :key="index">
    <th scope="row">{{item.id}}</th>
    <td>{{item.titulo}}</td>
    <td>{{item.duracion}}</td>
    <td>{{item.fechaEstreno}}</td>
    <td>
        <button class="btn btn-danger" @click="eliminarPelicula(item,index)">

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
<div>
<nav>
                    <ul class="pagination">
                        <li class="page-item" v-show="listadoPeliculas['prev_page_url']">
                            <a href="#" class="page-link" @click.prevent="getPreviousPage">
                                <span>
                                    <span aria-hidden="true">«</span>
                                </span>
                            </a>
                        </li>
                        <li class="page-item" :class="{ 'active': (listadoPeliculas['current_page']=== n) }" :v-for="n in listadoPeliculas['last_page']">
                            <a href="#" class="page-link" @click.prevent="getPage(n)">
                                <span >
                                    {{ n }}
                                </span>
                            </a>
                        </li>
                        <li class="page-item" v-show="listadoPeliculas['next_page_url']">
                            <a href="#" class="page-link" @click.prevent="getNextPage">
                                <span>
                                    <span aria-hidden="true">»</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
</div>
<formulario-editar :peliculaSeleccionada = "peliculaSeleccionada"></formulario-editar>


</div>
</template>

<script>
import SubirPelicula from './SubirPelicula.vue';
import FormularioEditar from './FormularioEditar.vue';

export default {
    components: {  FormularioEditar } ,
    data() {
        return {

            listadoPeliculas: {},
            
            
        }
    },

    mounted(){
        this.getListaPeliculas();
        
    },

    
    

    computed: {
        isActived: function(){  
            return this.pagination.current_page;

        },
        pagesNumber: function() {
            if(!this.pagination.to){
                return [];
            }
            var from = this.pagination.current_page - this.offset; 
            if(from < 1){
                from = 1;
            }
            var to = from + (this.offset * 2); 
            if(to >= this.pagination.last_page){
                o = this.pagination.last_page;
            }
            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;

            }
            return pagesArray;
            
            }
    },

    methods: {

        getListaPeliculas(){
            axios.get('/staff/extraerPeliculas').then(res => {

                this.listadoPeliculas = res.data.peliculas.data
                
            }).catch(e =>{
            console.log(e);
            })
        },

        getPage(page){
            
            axios.get('/staff/extraerPeliculas?page='+page).then(res => {

                this.listadoPeliculas = res.data.peliculas.data
                
            }).catch(e =>{
            console.log(e);
            })
        },
        getPreviousPage(){
            axios.get(this.listadoPeliculas['prev_page_url']).then(res => {

                this.listadoPeliculas = res.data.peliculas.data
                
            }).catch(e =>{
            console.log(e);
            })
        },

        getNextPage(){
            axios.get(this.listadoPeliculas['next_page_url']).then(res => {

                this.listadoPeliculas = res.data.peliculas.data
                
            }).catch(e =>{
            console.log(e);
            })
        },

    
        
        eliminarPelicula(item,index){
            
            axios.delete(`/staff/peliculas/${item.id}`)
                .then(()=>{
                    
                    this.listadoPeliculas.splice(index,1);
                    this.peliculas_totales-=1;
                    $("#totalPeliculas").text(this.peliculas_totales);
                    

                })
        },


        editarFormulario(item){
            
            this.peliculaSeleccionada = item,
            console.log(this.peliculaSeleccionada);
            this.bandera=true;
            
            
            $("#editar").modal("show");

        },

    
        
        changePage: function(page){
            
            this.pagination.current_page = page;
            this.listarPeliculas(page);
        },
    
},
}
</script>

<style scoped>

</style>