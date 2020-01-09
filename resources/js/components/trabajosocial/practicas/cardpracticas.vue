<template>
    <div class="contenedorCard">
        <p class="subtitulos">{{tipo === 'ss' ? 'Servicio Social' : 'Practicas Profesionales'}}</p>
        <div class="micardsm" data-toggle="modal" data-target="#addPracticas">
            <div class="contenedorPracticasServicio">
                <div>
                    <label><b>Dependencia</b> {{practica.dependencia ? practica.dependencia.Nombre : ''}} </label>
                    <label><b>Fecha Inicio</b>{{practica.FechaInicio}}</label>
                    <label><b>Fecha Fin</b>{{practica.FechaFin}}</label>
                </div>
            </div>
        </div>


        <div v-if="alumno.IdAlumno" class="col centrar">
            <button type="button" class="top-space d-block mx-auto" data-toggle="modal" data-target="#addPractServenAlumn"
                @click="$emit('agregarPracticaAlumno', alumno)">
                <i class="fas fa-plus-circle"></i>
            </button>

              
            <add-practservi-alumn :tipo="tipo" @practicaAlumnoAgregada="practica = $event"></add-practservi-alumn>     
        </div>
       <crear-dependencia></crear-dependencia>
       <modal-button></modal-button>
    </div>
</template>

<script> 

    import bus from '../../../event-bus';
    export default {
        data() {
            return {
                practica: {},
                alumno: {}
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarPractica();
            });
        },
        methods: {
            jalarPractica() {
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/practica?tipo='+this.tipo).then(res => {
                    this.practica = res.data;
                    console.log(res);
                })
                .catch();
            }
        },
        props: ['tipo']
       
    }
</script>

<style>

</style>