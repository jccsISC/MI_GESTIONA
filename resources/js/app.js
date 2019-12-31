require('./bootstrap');

window.Vue = require('vue');

//aqui registramos nuestros componentes
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('modal-button', require('./components/trabajosocial/becas/modal-button.vue').default);
Vue.component('create-form-becas', require('./components/trabajosocial/becas/add.vue').default);


const app = new Vue({
    el: '#app',
});
