<template>
    <div class="contenedorCardG">  
        <spinner v-show="loading"></spinner>
        <p>Semestre:</p>    
        <p>Promedio:</p>      
        <div class="micardG">
            <table v-if="alumno.IdAlumno" class="table table-striped table-hover contentTable table table-sm">
                <thead>
                    <tr>
                        <th>Asignaturas</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>P4</th>
                        <th>P5</th>
                        <th>Promedio final</th>
                        <th>Ordinario</th>
                        <th>Inter</th>
                        <th>Extra</th>
                    </tr>
                </thead>

                <tbody>
                    <tr  v-for="(calificacion, key) in calificaciones" :key="key">
                        <td>{{calificacion.Materia}}</td>
                        <td v-for="i in 5" :key="i">{{unidad(calificacion.detalles, i)}}</td>
                        <td>{{calificacion.Calificacionfinal}}</td>
                    </tr>                            
                </tbody>
            </table>

            <p v-if="alumno.IdAlumno" class="subtitulos sizeCalGeneral">Promedio general: <label class="text-danger">{{promedioGeneral}}</label></p> 
        </div>
    </div>
</template>

<script>
   
    import bus from '../../event-bus';
    export default {

        computed:{
            promedioGeneral() {
                let promedio = 0;
                let counter = 0;
                if (!this.calificaciones.length) {
                    return '';
                }
                this.calificaciones.forEach(calificacion => {
                    promedio += calificacion.Calificacionfinal ? parseInt(calificacion.Calificacionfinal) : 0;
                    counter++;
                });
          
                return promedio/counter;
            }
        },
        data() {
            return {
                alumno: {},
                calificaciones: [],
                loading: true,
            }
        },
         created() {
            bus.$on('alumnoSeleccionado', alumno => {
                //  if(this.alumno.IdAlumno != alumno.IdAlumno){
                    this.alumno = alumno;
                    this.jalarCalificaciones();
                //  }
            });
        },
        methods:{
            jalarCalificaciones(){
                this.loading = false;
                axios.get('alumnos/'+this.alumno.IdAlumno+'/calificaciones').then(res =>{
                    console.log(res.data);
                    this.calificaciones = res.data;
                });
            },
            unidad(detalles, unidad) {
                let calificacion = '';
                if (!detalles) {
                    return calificacion;
                }
                detalles.forEach(detalle => {
                    if (detalle.Unidad == unidad) {
                        calificacion = detalle.Calificacion;
                        return;
                    }
                });

                return calificacion;
            }
        }
    
    }
</script>

<style>

    .sizeCalGeneral{
        font-size: 14px;
    }

    .contenedorCardG{
        margin-right: 10px;
    }

</style>