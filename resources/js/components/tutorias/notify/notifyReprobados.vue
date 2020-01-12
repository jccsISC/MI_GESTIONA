<template>
      <div class="contenedorCard">
        <p class="subtitulos">Alumnos Reprobados por Unidad</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones" v-for="(alumno, keypases) in alumnos" :key="keypases" @click="seleccionarAlumno(alumno)">
                <!--<img class="miCircle" src="images/circleAmarillo.png" alt="">-->
                <div class="minicontent">
                    <p class="sizeName pl-5 m-0"><b>{{ alumno.Nombre }} {{ alumno.ApePaterno }} {{ alumno.ApeMaterno }}</b></p>
                    <p class="pl-5 m-0"><b>Grado: {{ alumno.Grado }}</b></p>
                    <p class="pl-5 m-0"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <div class="minicontent">
                    <P class="sizeName m-0"><b>Pases <label class="textShadow">{{alumno.pases.length}}</label></b></P>
                    <p class="m-0 " v-for="(pase, keypases2) in alumno.pases" :key="keypases2">{{pase.Fecha}}</p>
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
                loading: true,
                fechaInicio: '',
                fechaFinal: '',
                semana:''
            }
        },
        created() {
            axios.get('/trabajosocial?tipo=pases').then(res => {
                this.alumnos = res.data.data;
                this.fechaInicio = res.data.fechas.Inicio;
                this.fechaFinal = res.data.fechas.Fin;
                this.semana = res.data.fechas.Semana;
                this.loading = false;
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