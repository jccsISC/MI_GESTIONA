<template>
    <div class="contenedorCard">
        <p class="subtitulos">Calificaciones</p>
        <div class="micard scrollTCalif colorText">
            <table v-if="alumno.IdAlumno" class="table table-striped table-hover contentTable table table-sm">
                <thead>
                    <tr>
                        <th>Asignaturas</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>P4</th>
                        <th>P5</th>
                        <th colspan="2">Promedio Final</th>
                    </tr>
                </thead>
                <!--<tbody>
                    <tr>
                        <td colspan="7" class="text-center">Sin resultados...</td>
                    </tr>
                </tbody>-->
                <tbody>
                    <tr v-for="(calificacion, key) in calificaciones" :key="key">
                        <td>{{calificacion.Materia}}</td>
                        <td v-for="i in 5" :key="i">{{unidad(calificacion.detalles, i) ? unidad(calificacion.detalles, i) : 'NC' }}</td>
                        <td>{{calificacion.Calificacionfinal}}</td>
                    </tr>          
                </tbody>
            </table>

            <p v-if="alumno.IdAlumno" class="subtitulos sizeCalGeneral">Promedio General: <label class="text-danger">{{promedioGeneral}}</label></p> 
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
                calificaciones: []
            }
        },
         created() {
            bus.$on('alumnoSeleccionado', alumno => {
                 if(this.alumno.IdAlumno != alumno.IdAlumno){
                    this.alumno = alumno;
                    this.jalarCalificaciones();
                 }
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
        font-size: 14px;
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