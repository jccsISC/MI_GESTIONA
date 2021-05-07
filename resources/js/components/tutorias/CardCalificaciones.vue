<template>
    <div class="contenedorCard">
        <p class="subtitulos">Calificaciones</p>
        <div class="micard colorText">
            <table v-if="alumno.IdAlumno" class="table-bordered table table-striped table-hover contentTable scrollCalificaciones table table-sm m-0">
                <thead style="background-color: #800000; border: solid #800000; color: white; border-radius: 8px 8px 0px 0px;">
                    <tr style="border: solid #800000; border-radius: 8px 8px 0px 0px;">
                        <th colspan="2">Asignaturas</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>P4</th>
                        <th>P5</th>
                        <th colspan="2">P.Final</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(calificacion, key) in calificaciones" :key="key">
                        <td colspan="2">{{calificacion.Materia}}</td>
                        <td v-for="i in 5" :key="i">{{unidad(calificacion.detalles, i) ? unidad(calificacion.detalles, i) : 'NC' }}</td>
                        <td>{{calificacion.Calificacionfinal}}</td>
                    </tr>          
                </tbody>
            </table>

            <p v-if="alumno.IdAlumno" class="subtitulos sizeCalGeneral m-0">Promedio General: <label class="text-danger m-0">{{promedioGeneral}}</label></p> 
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
                let pgeneral = 0;
                if (!this.calificaciones.length) {
                    return '';
                }
                this.calificaciones.forEach(calificacion => {
                    promedio += calificacion.Calificacionfinal ? parseInt(calificacion.Calificacionfinal) : 0;
                    counter++;
                });
          
                pgeneral = promedio/counter; 
                return pgeneral;
                console.log('promedio GENERAL: '+ this.pgeneral);
            }
        },
        data() {
            return {
                alumno: {},
                calificaciones: []
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
        font-size: 15px;
    }


    .scrollTCalif{
        height: 260px;
        /* background: #f7b6b6; */
        overflow: scroll;
        overflow: auto;
    }

    .scrollTCalif::-webkit-scrollbar{
        width: 1px;
    }

    .scrollTCalif::-webkit-scrollbar-thumb{
        background: #800000;
        width: 1px;
        
    }
</style>