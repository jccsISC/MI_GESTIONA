<template>
    <div class="contenedorCard">
        <p class="subtitulos-small">{{fechaInicio}} a {{fechaFinal}}</p>
        <p class="subtitulos-small">Semana {{semana}}</p>
        <p class="subtitulos">Notificación de justificantes</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones" v-for="(alumno, keyjustificante) in alumnos" :key="keyjustificante" @click="seleccionarAlumno(alumno)">
                <div class="minicontent">
                    <p class="sizeName pl-5 m-0"><b>{{ alumno.Nombre }}</b></p>
                    <p class="pl-5 m-0"><b>Grado: {{ alumno.Grado }}</b></p>
                    <p class="pl-5 m-0"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <div class="minicontent">
                    <p class="sizeName m-0"><b>Justificantes  <label class="textShadow">{{alumno.justificantes.length}}</label></b></p>
                    <p class="m-0" v-for="(justificante, keyjustificante2) in alumno.justificantes" :key="keyjustificante2">{{justificante.Fecha}}</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import bus from '../../../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true,
                fechaInicio: '',
                fechaFinal: '',
                semana:''
            }
        },
        created() {
            axios.get('/trabajosocial?tipo=justificantes').then(res => {
                this.alumnos = res.data.data;
                this.fechaInicio = res.data.fechas.Inicio;
                this.fechaFinal = res.data.fechas.Fin;
                this.semana = res.data.fechas.Semana;
                this.loading = false;
            });
        },
        methods: {

            seleccionarAlumno(alumno) {
                console.log('click');
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   
<style>

</style>