<template>
    <div class="contenedorCard">
        <p class="subtitulos-small">{{fechaInicio}} a {{fechaFinal}}</p>
        <p class="subtitulos-small">Semana {{semana}}</p>
        <p class="subtitulos">Notificación de inasistencias</p>
        <div class="micardNotifications colorText">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones mb-3" v-for="(alumno, keyinasistencia) in alumnos" :key="keyinasistencia" @click="seleccionarAlumno(alumno)">
                <div class="mcontent pl-2">
                    <p class="sizeName m-0"><b>{{ alumno.Nombre }} {{ alumno.ApePaterno }} {{ alumno.ApeMaterno }} </b></p>
                    <p class=" m-0"><b>Grado: {{ alumno.Grado }} semestre</b></p>
                    <p class=" m-0"><b>Grupo: {{ alumno.Grupo }}</b></p>
                </div>

                <!-- <div class="mcontent ml-3">
                    <p class="sizeName m-0"><b>Faltas a la Institución  <label class="textShadow">{{alumno.inasistencias.length}}</label></b></p>
                    <p class="pl-4 m-0" v-for="(inasistencia, keyinasistencia1) in alumno.inasistencias" :key="keyinasistencia1"><img class="micircle" src="images/circleRojo.png" alt=""> {{inasistencia.Fecha}}</p>
                </div> -->

                <div class="mcontent">
                    <p class="sizeName m-0"><b>Faltas por asignatura  <label class="textShadow">{{totalInasistencias(alumno.inasistenciasMateria)}}</label></b></p>
                    <p class="sizeName m-0"><b>Unidad  <label class="textShadow">{{unidad(alumno.inasistencias)}}</label></b></p>
                    <div class="scrollFM">
                        <p class="pl-2 m-0" v-for="(inasistencia, keyinasistencia2) in alumno.inasistenciasMateria" :key="keyinasistencia2"><img class="micircle" src="images/circleRojo.png" alt=""> {{inasistencia.materia}} - {{inasistencia.data.length}}</p>
                    </div>
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
                semana:'',
            }
        },
        created() {
            axios.get('/tutorias/inasistencias').then(res => {
                this.loading = false;
                this.alumnos = res.data.data;
                this.fechaInicio = res.data.fechas.inicio;
                this.fechaFinal = res.data.fechas.fin;
                this.semana = res.data.fechas.semana;
            });
        },
        methods: {
            unidad(inasistencias) {
                if (inasistencias && inasistencias.length) {
                    return inasistencias[0].parcial;
                }
                return '';
            },
            totalInasistencias(inasistencias) {
                const keys = Object.keys(inasistencias);
                let  contador = 0;
                keys.forEach(key => {
                   contador += inasistencias[key].data.length;
                });
                return contador;
            },
            seleccionarAlumno(alumno) {
                console.log('click');
                alumno.Unidad = this.unidad(alumno.inasistencias);
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   
<style>
    
    .mcontent{
        width: 30%;
        height: 80px;
        float: left;
        /* overflow: hidden; */
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

    .scrollFM{
        height: 55px;
        /* background: #f7b6b6; */
        overflow: scroll;
        overflow: auto;
    }

    .scrollFM::-webkit-scrollbar{
        width: 1px;
    }

    .scrollFM::-webkit-scrollbar-thumb{
        background: #800000;
        width: 1px;
    }

</style>