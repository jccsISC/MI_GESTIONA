<template>
      <div class="contenedorCard" id="reprobados-unidad">
        <p class="subtitulos">Alumnos reprobados por unidad</p>
        <div class="micardNotifications colorText">        
            <spinner v-show="loading"></spinner>
            <div class="micardNotificaciones mb-3" v-for="(calificacion, key) in calificaciones" :key="key" @click="seleccionarAlumno(calificacion.Alumno, calificacion.Unidad, calificacion.Reporte)">

                <div class="row">
                    <div class="col-md-4 text-center mt-2">
                        <p class="m-0"><b>{{ calificacion.Alumno.Nombre }} {{ calificacion.Alumno.ApePaterno }} {{ calificacion.Alumno.ApeMaterno }}</b></p>
                        <p class="m-0"><b>Grado: {{ calificacion.Alumno.Grado }} semestre</b></p>
                        <p class="m-0"><b>Grupo: {{ calificacion.Alumno.Grupo }}</b></p>
                    </div>
                    <div class="col-md-4 text-center mt-2">
                        <P class="sizeName m-0"><b>Materias reprobadas <label class="textShadow">{{calificacion.Materias.length}}</label></b></P>
                        <div class="scrollFM pb-3">
                            <p class="m-0 pl-2" v-for="(materia, keypases2) in calificacion.Materias" :key="keypases2"><img class="micircle" src="images/circleRojo.png" alt=""> {{materia}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mt-2">
                        <P class="sizeName m-0"><b>Unidad reprobada <label class="textShadow">{{calificacion.Unidad}}</label></b></P>
                    </div>
                </div>

                <div class="mcontent">
                    <!--  <p class="m-0 p-0">Motivo:</p>
                    <p class="m-0 pl-2">Faltas<img class="micircle mLeft " src="images/circleRojo.png" alt=""></p>
                    <p class="m-0 pl-2">Calificación<img class="micircle ml-1" src="images/circulo.png" alt=""></p> -->
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
                loading: true,
                fechaInicio: '',
                fechaFinal: '',
                semana:'',
                calificaciones: []
            }
        },
        created() {
            axios.get('/tutorias/reprobados').then(res => {
                this.calificaciones=res.data;
                console.log(res.data);
                this.loading = false;
            });
        },
        methods: {
            seleccionarAlumno(alumno, unidad, reporte) {
                alumno.Unidad = unidad;
                alumno.Reporte = reporte;
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   