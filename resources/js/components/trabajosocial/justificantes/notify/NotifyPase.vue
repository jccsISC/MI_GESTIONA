<template>
    <div class="contenedorCard">
        <p class="subtitulos">Notificación de pases de salida</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones colorText" v-for="(alumno, keypases) in alumnos" :key="keypases" @click="seleccionarAlumno(alumno)">
               
                <div class="minicontent">
                    <p class="sizeName pl-5 m-0"><b>{{ alumno.Nombre }} {{ alumno.ApePaterno }} {{ alumno.ApeMaterno }}</b></p>
                    <p class="pl-5 m-0 mt-1"><b>Grado: {{ alumno.Grado }} semestre</b></p>
                    <p class="pl-5 m-0 mt-1"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <div class="minicontent">
                    <P class="sizeName m-0 p-0"><b>Pases de salida <label class="textShadow">{{alumno.pases.length}}</label></b></P>
                    
                    <div class="scrolPase">
                        <p class="m-0 p-0" v-for="(pase, keypases2) in alumno.pases" :key="keypases2"><img class="micircle" src="images/circleRojo.png" alt="">  {{pase.Fecha}}</p>
                    </div>
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
            this.jalarAllPases();
             bus.$on('busPases', () => {
                this.jalarAllPases();
            });
        },
        methods: {
            seleccionarAlumno(alumno) {
                bus.$emit('alumnoSeleccionado', alumno);               
            },
            jalarAllPases() {
                    axios.get('/trabajosocial?tipo=pases').then(res => {
                    this.alumnos = res.data.data;
                    this.fechaInicio = res.data.fechas.Inicio;
                    this.fechaFinal = res.data.fechas.Fin;
                    this.semana = res.data.fechas.Semana;
                    this.loading = false;
                });
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
        float: left;
    }

    .scrolPase {
        width: 105px;
        height: 55px;
        overflow: auto;
    }
 
    .scrolPase::-webkit-scrollbar{
        width: 1px;
    }

    
    .scrolPase::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
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