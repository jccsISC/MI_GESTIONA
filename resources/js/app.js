require('./bootstrap');

window.Vue = require('vue');

//aqui registramos nuestros componentes
Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
});
