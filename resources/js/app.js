require('./bootstrap');

window.Vue = require('vue');


//becas
Vue.component('modal-beca', require('./components/trabajosocial/becas/Modal-buttonBeca.vue').default);
Vue.component('ver-becas', require('./components/trabajosocial/becas/VerBecas.vue').default);
Vue.component('card-becas', require('./components/trabajosocial/becas/CardBecas.vue').default);
Vue.component('detalleBeca', require('./components/trabajosocial/becas/DetalleBeca.vue').default);
Vue.component('create-form-becas', require('./components/trabajosocial/becas/AgregarBeca.vue').default);

//justificantes
Vue.component('card-notify-justificantes', require('./components/trabajosocial/justificantes/notify/notifyjusti.vue').default);
Vue.component('card-notify-reprobados', require('./components/trabajosocial/justificantes/notify/notifyrepro.vue').default);
Vue.component('card-justificantes', require('./components/trabajosocial/justificantes/CardJustificantes.vue').default);
Vue.component('card-info-personal', require('./components/trabajosocial/CardInfoPersonal.vue').default);
Vue.component('add-justificante', require('./components/trabajosocial/justificantes/AgregarJustificante.vue').default);
Vue.component('modal-justificante', require('./components/trabajosocial/justificantes/Modal-buttonJustificante.vue').default);

//practicas
Vue.component('card-practicas', require('./components/trabajosocial/practicas/cardpracticas.vue').default);
Vue.component('create-form-practicas', require('./components/trabajosocial/practicas/AgregarPractica.vue').default);

//dependencias
Vue.component('modal-button', require('./components/trabajosocial/dependencias/Modal-button.vue').default);
Vue.component('ver-dependencias', require('./components/trabajosocial/dependencias/VerDependencias.vue').default);
Vue.component('crear-dependencia', require('./components/trabajosocial/dependencias/AgregarDependencias.vue').default);
Vue.component('add-practservi-alumn', require('./components/trabajosocial/dependencias/AddPracServAlumn.vue').default);



//TUTORIAS--------------------------------------------------------------------------------
//Calificaciones
Vue.component('card-calificaciones', require('./components/tutorias/CardCalificaciones.vue').default);

//Faltas
Vue.component('card-faltas', require('./components/tutorias/CardFaltas.vue').default);

//notify
Vue.component('card-notify-inacistencias', require('./components/tutorias/notify/notifyInacistencias.vue').default);
Vue.component('card-notify-reprobados', require('./components/tutorias/notify/notifyReprobados.vue').default);





const app = new Vue({
    el: '#app',
});
