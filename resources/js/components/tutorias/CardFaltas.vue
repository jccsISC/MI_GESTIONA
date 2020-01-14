<template>
    <div class="contenedorCard">
        <p class="subtitulos">Faltas por Asignatura</p>
        <div class="micard" onclick="abrir()">
            <table class="table table-striped table-hover contentTable table table-sm">
                        <thead>
                            <tr>
                                <th>Asignaturas</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <!--<tbody>
                            <tr>
                                <td colspan="7" class="text-center">Sin resultados...</td>
                            </tr>
                        </tbody>-->
                        <tbody>
                            <tr v-for="(materia, key) in materias" :key="key">
                                <td>{{materia.materia}}</td>
                                <td>
                                    <div v-for="(fecha, keyfecha) in materia.data" :key="keyfecha">{{fecha}}</div>
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
        </div>
    </div>
</template>

<script>
   
    import bus from '../../event-bus';
    export default {
        data() {
            return {
                alumno: {},
                materias: []
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarInasistencias();
            });
        },
        methods:{
            jalarInasistencias() {
                axios.get('/tutorias/'+this.alumno.IdAlumno+'/inasistencias').then(res => {
                    this.materias = res.data;
                });
            }
        }
    
    }
</script>

<style>

</style>