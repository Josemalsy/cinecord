require('./bootstrap');


window.Vue = require('vue');

Vue.component('portada', require('./components/PeliculasPortadaComponent.vue').default);
Vue.component('sidebar', require('./components/SidebarComponent.vue').default);
Vue.component('valoracion', require('./components/ValoracionComponent.vue').default);
Vue.component('botones', require('./components/BotonesPortadaComponent.vue').default);


const sidebar = new Vue({
    el: '#app'
});



