<template>

<div>
    
        <vue-table-dynamic 
        :params="pelis"
        @select="onSelect" 
        
        ref="table"
        ></vue-table-dynamic>
    
<div>
</div>
<formulario-editar :peliculaSeleccionada = "peliculaSeleccionada"></formulario-editar>

</div>
</template>

<script>
import SubirPelicula from './SubirPelicula.vue';
import FormularioEditar from './FormularioEditar.vue';
import VueTableDynamic from 'vue-table-dynamic';
import Swal from 'sweetalert2'
export default {
    components: {  FormularioEditar , VueTableDynamic } ,
    data() {

        return {

        pelis:{
            data: [
            ['Ref','Ruta imagen', 'Titulo', 'Director', 'Duración', 'Genero', 'Reparto', 'Sinopsis','Clasificación','Fecha de Estreno','Tipo de Película','Trailer'],
            
        
        ],
        header: 'row',
        showCheck:true,
        enableSearch:true,
        sort:[0,1],
        border: true,
        stripe: true,
        pagination: true,
        pageSize: 5,
        pageSizes: [1, 2, 3],
        highlight: { column: [-3] },
        highlightedColor: 'rgb(243, 235, 200)',
        columnWidth: [{column: 0, width: '5%'}, {column: 1, width: '15%'},{column: 9, width: '15%'},{column: 10, width: '15%'}],

    
        
        },
            bandera: false,
            peliculaSeleccionada:[],
            peliculas_totales:0,

            
        
        }
    },

    created(){
        this.listarPeliculas();
        
        
    },


    methods: {

    onSelect (isChecked, index, data) {
        console.log('onSelect: ', isChecked, index, data)
        console.log("Data id: "+data[0])
        var idItem = data[0];
        
        console.log('Checked Data:', this.$refs.table.getCheckedRowDatas(true))

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Que deseas hacer?',
            text: "Puedes editar o eliminar la pelicula seleccionada",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, quiero borrarla!',
            cancelButtonText: 'No, quiero editarla!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                this.eliminarPelicula(data[0])
                
                swalWithBootstrapButtons.fire(
                    
                'Deleted!',
                'Pelicula Borrada con éxito',
                'success'
                )
                
        } else if (
                this.editarFormulario(data)
        ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
                )
                
        }
        })
            
        
        
        
        
        
        
    },
    eliminarPelicula(item){
        
        axios.delete(`/staff/peliculas/${item}`)
            .then(()=>{
            
                
                
                this.listarPeliculas();
                

            })
    },


    editarFormulario(item){
        
        this.peliculaSeleccionada = item,
        
        this.bandera=true;
        
        
        $("#editar").modal("show");

    },

    listarPeliculas(){
        // ['Ref', 'Titulo', 'Director', 'Duración', 'Genero', 'Reparto', 'Sinopsis','Clasificación','Fecha de Estreno','Tipo de Película'],

        axios.get('/staff/extraerPeliculas').then(response => {
            var result;
            for (var i = 0; i < response.data.length; i++) {
                    let result = [];
                        result.push(
                            
                            response.data[i].id,
                            response.data[i].imagen_promocional,
                            response.data[i].titulo,
                            response.data[i].director,
                            response.data[i].duracion,
                            response.data[i].genero,
                            response.data[i].reparto,
                            response.data[i].sinopsis,
                            response.data[i].clasificacion,
                            response.data[i].fechaEstreno,
                            response.data[i].tipo_pelicula,
                            response.data[i].trailer,
                            );
                        this.pelis.data.push(result);
                }




            console.log(this.pelis);
            console.log(this.params)
            
    })
    },
    
    
    
},
}
</script>

<style scoped>
.v-table-dynamic[data-v-0ad86160]{
    font-size: 11px;
}
</style>