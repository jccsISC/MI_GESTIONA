// <template>
    <div class="contenedorCard">
        <p class="subtitulos">Faltas por asignatura</p>
        <div class="micard scrollTCalif colorText">
            <table v-if="alumno.IdAlumno" class="table-bordered table table-striped table-hover contentTable scrollCalificaciones table table-sm">
                <thead style="background-color: #800000; border: solid #800000; color: white; border-radius: 8px 8px 0px 0px;">
                    <tr style="border: solid #800000; border-radius: 8px 8px 0px 0px;">
                        <th>Asignaturas</th>
                        <th colspan="3">Días</th>
                    </tr>
                </thead>
    
                <tbody style="text-align: center;">
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
        methods: {
            jalarInasistencias() {
                axios.get('/tutorias/'+this.alumno.IdAlumno+'/inasistencias').then(res => {
                    this.materias = res.data;
                });
            }
        }
    
    }
</script>
