<template>
    <div class="contenedorCard">
        <p class="subtitulos">Notificación de pases de salida</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones" v-for="(alumno, keypases) in alumnos" :key="keypases" @click="seleccionarAlumno(alumno)">
               
                <div class="minicontent">
                    <p class="sizeName pl-5 m-0"><b>{{ alumno.Nombre }} {{ alumno.ApePaterno }} {{ alumno.ApeMaterno }}</b></p>
                    <p class="pl-5 m-0"><b>Grado: {{ alumno.Grado }} semestre</b></p>
                    <p class="pl-5 m-0"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <div class="minicontent">
                    <P class="sizeName m-0 p-0"><b>Pases <label class="textShadow">{{alumno.pases.length}}</label></b></P>
                    <p class="m-0 p-0" v-for="(pase, keypases2) in alumno.pases" :key="keypases2"><img class="micircle" src="images/circleRojo.png" alt="">  {{pase.Fecha}}</p>
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
    .micardNotificaciones{
        padding-top: 3px;
    }

    .micardNotifications{
        overflow-y: auto;
    }

    .micardNotifications::-webkit-scrollbar{
    width: 0px;
    }
    
    .minicontent{
        width: 50%;
        height: 80px;
        float: left;
        overflow-y: auto;
    }

    .minicontent::-webkit-scrollbar{
    width: 0px;
    }

    .sizeName{
        font-size: 15px;
    }

    .textShadow{
        margin: 0;
        color: rgb(165, 0, 0);
        text-shadow: 1px 1px 5px #2c2b2b86;
    }
    
</style>