<template>
<div class="contenedorCard">
        <p class="subtitulos-small">{{fechaInicio}} a {{fechaFinal}}</p>
        <p class="subtitulos-small">Semana {{semana}}</p>
        <p class="subtitulos">Notificación de Inasistencias</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones" v-for="(alumno, keyjustificante) in alumnos" :key="keyjustificante" @click="seleccionarAlumno(alumno)">
                <div class="mcontent ml-5">
                    <p class="sizeName m-0"><b>{{ alumno.Nombre }} {{ alumno.ApePaterno }} {{ alumno.ApeMaterno }} </b></p>
                    <p class=" m-0"><b>Grado: {{ alumno.Grado }}</b></p>
                    <p class=" m-0"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <div class="mcontent ml-3">
                    <p class="sizeName m-0"><b>Faltas a la Institución  <label class="textShadow">{{alumno.justificantes.length}}</label></b></p>
                    <p class="pl-4 m-0" v-for="(justificante, keyjustificante2) in alumno.justificantes" :key="keyjustificante2"><img class="micircle" src="images/circleRojo.png" alt=""> {{justificante.Fecha}}</p>
                </div>

                
                <div class="mcontent">
                    <p class="sizeName m-0"><b>Faltas por asignatura  <label class="textShadow">{{alumno.justificantes.length}}</label></b></p>
                    <p class="pl-4 m-0" v-for="(justificante, keyjustificante2) in alumno.justificantes" :key="keyjustificante2"><img class="micircle" src="images/circleRojo.png" alt=""> {{justificante.Fecha}}</p>
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
    
    .micardNotificaciones{
        padding-top: 3px;
    }


    .mcontent{
        width: 30%;
        height: 80px;
        float: left;
        overflow: hidden;
    }

    .sizeName{
        font-size: 15px;
    }

    .textShadow{
        margin: 0;
        color: rgb(165, 0, 0);
        text-shadow: 1px 1px 5px #2c2b2b86;
    }
    
    .micircle{
        width: 10px;
        padding: 0;
    }

</style>