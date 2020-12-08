/** PELICULAS */
Vue.component('peliculas', {
  
    template: 
    
    `<ul>
        <li  v-for="(pelicula,index) in peliculas" :key="index">
            {{pelicula.titulo}}
            
        </li>
    </ul>
    
    `,
  
    data: function(){
      return{
        peliculas:  [''],
      }
    },
  // Como si fuera onload
    created(){
      
      axios.get('/staff/extraerPeliculas').then(respuesta => {
            
       
        this.peliculas = respuesta.data;
        
     })
     .catch(e =>{
       console.log(e);
     })
        // this.listarPeliculas();
  
  
      
        
      },
  
      methods: {
        // listarPeliculas: function(){
          
        //   axios.get('/staff/extraerPeliculas').then(respuesta => {
            
        //    alert(respuesta.data[0].titulo); 
        //    this.peliculas = respuesta.data;
        // })
        // .catch(e =>{
        //   console.log(e);
        // })
  
  
        
          
        // }
      }
  
      
  
  
  
    })
  
  // Instancia de Vue
  new Vue({ el: '#app' })