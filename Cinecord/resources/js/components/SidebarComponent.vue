<template>

    <div class="col-md-10">
            <input type="text" placeholder="Buscar por titulo" v-on:keyup="enviarTitulo()" class="form-control cajon" v-model="nombre">
    <div class="botones">       
<table>
  <tbody v-on:change="enviarRadio()">
    <tr>
      <td>Accion</td>
      <td> <input type="radio" id="genero" value="acción" v-model="picked"> </td>
    </tr>
    <tr>
    <td> Animación </td>
    <td><input type="radio" id="genero" value="animación" v-model="picked"> </td>
    </tr>
    <tr>
      <td>Aventuras</td>
      <td><input type="radio" id="genero" value="aventuras" v-model="picked"></td>
    </tr>
    <tr>
      <td>Bélicas</td>
      <td><input type="radio" id="genero" value="bélic" v-model="picked"></td>
    </tr>
    <tr>
      <td>Ciencia Ficción</td>
      <td><input type="radio" id="genero" value="ciencia ficcion" v-model="picked"></td>
    </tr>
    <tr>
      <td>Cine negro</td>
      <td><input type="radio" id="genero" value="cine negro" v-model="picked"></td>
    </tr>
    <tr>
      <td>Comedia</td>
      <td><input type="radio" id="genero" value="comedia" v-model="picked"></td>
    </tr>
    <tr>
      <td>Documental</td>
      <td><input type="radio" id="genero" value="documental" v-model="picked"></td>
    </tr>
    <tr>
      <td>Fantásticas</td>
      <td><input type="radio" id="genero" value="fantas" v-model="picked"></td>
    </tr>
    <tr>
      <td>Gore</td>
      <td><input type="radio" id="genero" value="gore" v-model="picked"></td>
    </tr>
    <tr>
      <td>Histórico</td>
      <td><input type="radio" id="genero" value="histori" v-model="picked"></td>
    </tr>
    <tr>
      <td>Infantil</td>
      <td><input type="radio" id="genero" value="infantil" v-model="picked"></td>
    </tr>
    <tr>
      <td>Misterio</td>
      <td><input type="radio" id="genero" value="misterio" v-model="picked"></td>
    </tr>
    <tr>
      <td>Musical</td>
      <td><input type="radio" id="genero" value="musical" v-model="picked"></td>
    </tr>
    <tr>
      <td>Policiacas</td>
      <td><input type="radio" id="genero" value="polic" v-model="picked"></td>
    </tr>
    <tr>
      <td>Románticas</td>
      <td><input type="radio" id="genero" value="románticas" v-model="picked"></td>
    </tr>
    <tr>
      <td>Suspense</td>
      <td><input type="radio" id="genero" value="suspense" v-model="picked"></td>
    </tr>
    <tr>
      <td>Terror</td>
      <td><input type="radio" id="genero" value="terror" v-model="picked"></td>
    </tr>
    <tr>
      <td>Thriller</td>
      <td><input type="radio" id="genero" value="thriller" v-model="picked"></td>
    </tr>
    <tr>
      <td>Wéstern‎</td>
      <td><input type="radio" id="genero" value="wéstern" v-model="picked"></td>
    </tr>

  </tbody>
</table>
    <button class="btn btn-info text-white" v-on:click="limpiarFiltros()"> Limpiar filtros</button>            
</div>                  
    </div>
    
</template>

<script>
export default {
     
    data() {    
        return {
            nombre: "",
            picked: "",
        }                  
    },
    methods:{
        enviarTitulo(){
            this.$emit('busq',this.nombre);
        },
            enviarRadio(){
            this.$emit('busqueda',this.picked);
        },
        limpiarFiltros(){
            $("input:radio").prop("checked", false);
            $("input").val("");
            this.picked = "";
            this.nombre = "";
            this.$emit('busq',this.nombre);
            this.$emit('busqueda',this.picked);
        }
    },           
}

</script>


<style>

table{
    margin-top: 10%;
    text-align: center;
}

#genero{
    margin-left: 50%;
   
}

</style>