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
        <!--btn agregar dependencia-->
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