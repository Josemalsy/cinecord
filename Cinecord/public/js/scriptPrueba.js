var urlKeeps = 'prueba';

new Vue({
    el: '#pruebaVue',
    created: function() {
        this.getKeeps();
    },
    data: {
        keeps: []
    },
    methods: {
        getKeeps: function() {

            axios.get('prueba').then(response=>this.keeps = response.data)

            .catch(e => {
                console.log(e);
            })

          
        }
    }
});

