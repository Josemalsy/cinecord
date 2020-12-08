

require('./bootstrap');


window.Vue = require('vue');

Vue.component('asignar', require('./components/AsignarComponent.vue').default);




// Componentes Globales
Vue.component('sidebar-admin', require('./components/panel-component/Sidebar.vue').default);
Vue.component('navegacion-cluster', require('./components/NavegacionCluster.vue').default);
Vue.component('tablero-admin',require('./components/panel-component/Tablero-admin.vue').default);

// Crud Películas
Vue.component('subir-pelicula', require('./components/crud-peliculas/SubirPelicula.vue').default);
Vue.component('listar-peliculas', require('./components/crud-peliculas/ListarPeliculas.vue').default);
Vue.component('formulario-editar', require('./components/crud-peliculas/FormularioEditar.vue').default);
Vue.component('formulario-insertar', require('./components/crud-peliculas/FormularioInsertar.vue').default);

// Crud Salas
Vue.component('subir-sala', require('./components/crud-salas/SubirSala.vue').default);
Vue.component('formulario-insertar-sala', require('./components/crud-salas/FormularioInsertar.vue').default);
Vue.component('formulario-editar-sala', require('./components/crud-salas/FormularioEditar.vue').default);
Vue.component('listar-salas', require('./components/crud-salas/ListarSalas.vue').default);


const app = new Vue({
    el: '#app',
    
});


