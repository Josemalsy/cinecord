<template>
    <div>
        
        
            
        <formulario-insertar></formulario-insertar>
            
        
    </div>
    
</template>

<script>
import FormularioInsertar from './FormularioInsertar.vue'
import ListarPeliculas from './ListarPeliculas.vue'
// import FormularioEditar from './FormularioEditar.vue'
// import FormularioInsertar from './FormularioInsertar.vue'
// import ListarPeliculas from './ListarPeliculas.vue'
export default {
components: { ListarPeliculas, FormularioInsertar },
//   components: { FormularioEditar, ListarPeliculas },
    data() {
        return {
            banderaRecibida:'',
            // item:[],
            
        }
},
    
    
}
</script>
<style lang="stylus" scoped>

</style>