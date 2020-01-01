require('./bootstrap');

window.Vue = require('vue');

//aqui registramos nuestros componentes
Vue.component('create-form-becas', require('./components/trabajosocial/becas/add.vue').default);
Vue.component('card-becas', require('./components/trabajosocial/becas/cardbecas.vue').default);


const app = new Vue({
    el: '#app',
});
