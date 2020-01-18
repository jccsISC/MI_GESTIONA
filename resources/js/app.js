require('./bootstrap');

window.Vue = require('vue');

Vue.component('spinner', require('./components/generales/Spinner.vue').default);

//Tota la info del alumno en este componente
Vue.component('mi-buscador', require('./components/generales/Buscador.vue').default);
Vue.component('card-info-personal', require('./components/generales/CardInfoPersonal.vue').default);
Vue.component('card-info-personal-general', require('./components/generales/CardInfoPersonalGeneral.vue').default);
Vue.component('allinfo', require('./components/generales/infoGeneralAlumno.vue').default);
Vue.component('cal-general', require('./components/generales/calGeneral.vue').default);

//becas
Vue.component('ver-becas', require('./components/trabajosocial/becas/VerBecas.vue').default);
Vue.component('card-becas', require('./components/trabajosocial/becas/CardBecas.vue').default);
Vue.component('detalleBeca', require('./components/trabajosocial/becas/DetalleBeca.vue').default);
Vue.component('create-form-becas', require('./components/trabajosocial/becas/AgregarBeca.vue').default);

//justificantes
Vue.component('card-notify-justificantes', require('./components/trabajosocial/justificantes/Notify/notifyjusti.vue').default);
Vue.component('card-notify-pases', require('./components/trabajosocial/justificantes/notify/NotifyPase.vue').default);
Vue.component('card-justificantes', require('./components/trabajosocial/justificantes/CardJustificantes.vue').default);
Vue.component('add-justificante', require('./components/trabajosocial/justificantes/AgregarJustificante.vue').default);

//practicas
Vue.component('card-practicas', require('./components/trabajosocial/practicas/cardpracticas.vue').default);

//dependencias
Vue.component('ver-dependencias', require('./components/trabajosocial/dependencias/VerDependencias.vue').default);
Vue.component('crear-dependencia', require('./components/trabajosocial/dependencias/AgregarDependencias.vue').default);
Vue.component('add-practservi-alumn', require('./components/trabajosocial/dependencias/AddPracServAlumn.vue').default);



//TUTORIAS------------------------------------------------------------------------------------------------------------------
//Calificaciones
Vue.component('card-calificaciones', require('./components/tutorias/CardCalificaciones.vue').default);
//Faltas
Vue.component('card-faltas', require('./components/tutorias/CardFaltas.vue').default);
Vue.component('modal-generar-report', require('./components/tutorias/ModalGenerarReport.vue').default);
Vue.component('generar-reporte', require('./components/tutorias/GenerarReporte.vue').default);
//Notify
Vue.component('card-notify-inacistencias', require('./components/tutorias/notify/NotifyInacistencias.vue').default);
Vue.component('card-notify-reprobados', require('./components/tutorias/notify/NotifyReprobados.vue').default);



//ORIENTACION----------------------------------------------------------------------------------------------------
//Salud
Vue.component('card-salud', require('./components/orientacion/salud/CardSalud.vue').default);
Vue.component('add-salud', require('./components/orientacion/salud/AgregarSalud.vue').default);
//Incidencias
Vue.component('card-incidencias', require('./components/orientacion/incidencias/CardIncidencias.vue').default);
Vue.component('genera-mala-conducta', require('./components/orientacion/incidencias/GenerarReporteConducta.vue').default);
Vue.component('genera-incidencia', require('./components/orientacion/incidencias/GenerarReporte.vue').default);
//Notify
Vue.component('card-notify-seguimiento', require('./components/orientacion/notify/notifySeguimiento.vue').default);
Vue.component('card-notify-talleres', require('./components/orientacion/notify/notifyTalleres.vue').default);
Vue.component('historial-talleres', require('./components/orientacion/notify/HistorialTalleres.vue').default);
Vue.component('generar-report-oe', require('./components/orientacion/ModalReportOE.vue').default);
Vue.component('detalle-taller', require('./components/orientacion/talleres/DetalleTaller.vue').default);
//Inasistencias
Vue.component('inasistencias', require('./components/inasistencias/AgregarInasistencias.vue').default);
//Reportes
Vue.component('reportes', require('./components/reportes/ReportesALL.vue').default);










//---------------------------------------------------------------------------------------------------------------------
const app = new Vue({
    el: '#app',
});
