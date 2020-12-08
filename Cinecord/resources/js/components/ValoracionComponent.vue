<template>

<div>

  <div v-if="escribeValor">

    <div v-for="critica in criticas">
      <div v-if="critica.pelicula_id == id_pelicula && critica.user_id == user_id">    
        {{compruebaValoracion()}}

   
      </div>
    </div>

    <div> 
      <div v-if="comprobacion" class="alert alert-warning" role="alert">
        <p> Ya has escrito tu reseña en esta pelicula. Para cambiarla o borrarla acude a tu perfil de usuario. </p>        
      </div>

      <div v-else>
        <form @submit="agregar">
          <p class="clasificacion">
            
            <h2>
              <div class="container">
              
              <input id="radio1" type="radio" name="estrellas" v-model="picked" value="5"><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" v-model="picked" value="4"><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" v-model="picked" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" v-model="picked" value="2"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio5" type="radio" name="estrellas" v-model="picked" value="1"><!--
                --><label for="radio5">★</label>
              </div>  
            </h2>
          </p>         
          <textarea placeholder="mete aqui tu opinion" class="form-control mb-2" v-model="valoraciones.texto"> </textarea>            
          <button class="btn btn-success" type="submit">Agregar</button>
          </form>         
        </div>
    </div>  
  </div>

  <div v-else>
    <div class="caja-comentario" v-for="(critica,index) in criticas" :key="index">

      <div class="caja-comentario-head row-cols-1">
        <span class="nombre col-md-8">Escrito por: {{critica.name}} </span>
        <small class="fecha col-md-4">{{formateaFecha(critica.created_at)}}</small>     
      </div>

      <div class="caja-comentario-body">
        <ul>
          <div>
            <div>
              <p class="valoracion">{{generaValoracion(critica.valoracion)}}</p>
            </div>
            
            <div>
              <p class="analisis">{{critica.texto}}</p>
            </div>  
          </div>                
        </ul>

      </div>
    </div>

  <div>
      <nav aria-label="Page navigation example"> 
        <ul class="pagination">
          <li v-if="pagination.current_page > 1" class="page-item">
            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
              <span>Atras</span>
            </a>
          </li>

          <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
            <a class="page-link" href="#" @click.prevent="changePage(page)">
              {{page}}
            </a>
          </li>

          <li class="page-item" v-if="pagination.current_page < pagination.last_page">
            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
              <span>Siguiente</span>
            </a>
          </li>
        </ul>
      </nav> 
    </div>
  </div>

</div>
</template>

<script>

    export default{
        data(){
            return{
                criticas: [],
                creaCriticas: [],
                valoraciones: {valor: '',texto: '',peli_id: ''},
                comprobacion: false,
                picked: '',
                offset: 1,
		            pagination: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0               
              },
            }
        },
        created(){
          this.recibe();
        },  
        props: {
            id_pelicula: Number,
            user_id: Number,
            escribeValor: Boolean,
        },
        computed: {
          isActived: function() {
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
              to = this.pagination.last_page;
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
          recibe(page){
            console.log("la pagina: " + page)
            axios.get('critica?page='+page,
            {
              params: {
                pelicula_id: this.id_pelicula,
              }
            }).then(res => {
            this.criticas = res.data.criticas.data;
            this.pagination = res.data.pagination;
            })
          },
          agregar(){
            this.comprobacion = true;
            const params = {
              valor: this.picked,
              texto: this.valoraciones.texto,
              peli_id: this.id_pelicula,              
            }
            axios.post('critica', params).then(res => {
            this.criticas.push(res.data);
            })
          },
          compruebaValoracion(){
            this.comprobacion = true;
          },
          generaValoracion(valores){
            let valor = '';
            for (let index = 0; index < valores; index++) {
              valor += '★';           
            }
            return valor;
          },
		      changePage: function(page) {
            this.pagination.current_page = page;
            console.log("la pagina de changepage: " + page)
			      this.recibe(page);
          },
          formateaFecha: function(created_at){
            let fecha = created_at.slice(0,created_at.indexOf('T'));
            let hora = created_at.slice(created_at.indexOf('T')+1,created_at.indexOf('.'));
            return hora + " " + fecha;
          },
        },
    }

</script>



<style scoped>

.container{
    text-align: center;
    direction: rtl;
}

#form p {
  text-align: right;
}

#form label {
  font-size: 20px;
}

input[type="radio"] {
  opacity: 0;
  position: relative;
  right: 4%;
  top: -3%;
    /* Doble-tamaño Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari y Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px;
  
}

label {
  color: grey;
}

.clasificacion {
  
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
  
}

input[type="radio"]:checked ~ label {
  color: orange;
}

.valoracion{
  color: orange;
  font-size: 20px;
}

.caja-comentario{
  border: gray 1px solid;
  margin: 5px;
  background-color: #ccfcd9;
  box-shadow: 1px 1px gray;

}

.caja-comentario-head{
  border-bottom: gray 1px solid;
  width: 100%;
}

.nombre{
  text-align:left;
  font-size: 20px;
}

.fecha {
  text-align: right;
  display: flow;
}

.analisis{
  font-size: 15px;
  padding:0;
}

</style>