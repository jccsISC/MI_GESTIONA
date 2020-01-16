<template>
    <div class="contenedorCard">
        <p class="subtitulos">Notificación de seguimiento</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones" v-for="(alumno, keyjustificante) in alumnos" :key="keyjustificante" @click="seleccionarAlumno(alumno)">
                <div class="minicontent">
                    <p class="sizeName pl-5 m-0"><b>{{ alumno.Nombre }} {{ alumno.ApePaterno }} {{ alumno.ApeMaterno }}</b></p>
                    <p class="pl-5 m-0"><b>Grado: {{ alumno.Grado }} semestre</b></p>
                    <p class="pl-5 m-0"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <div class="minicontent">
                    <p class="sizeName m-0"><b>Seguimiento <label class="textShadow">{{alumno.reportes.length}}</label></b></p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import bus from '../../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true
            }
        },
        created() {
            axios.get('/orientacion').then(res => {
                this.loading = false;
                this.alumnos = res.data;
                
            });
        },
        methods: {
            seleccionarAlumno(alumno) {
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   
<style>

</style>