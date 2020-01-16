<template>
    <div class="contenedorCard">
        <p class="subtitulos">Historial de talleres tomados</p>
            <div class="micardTalleres">
                <spinner v-show="loading"></spinner>
                <table class="table table-striped table-hover contentTable table table-sm">
                    <thead>
                        <tr>
                            <th>Grupos</th>
                            <th colspan="2">Taller</th>
                            <th>Beneficiarios</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr>
                            <td style="background: #800000; color:white; text-align: center;">3 A</td>
                            <td colspan="2">Pediculosis</td>
                            <td>24</td>
                            <td>14-01-2020</td>
                            <td>10:00:00</td>
                        </tr>
                          <tr>
                            <td style="background: #800000; color:white; text-align: center;">3 A</td>
                            <td colspan="2">Pediculosis</td>
                            <td>24</td>
                            <td>14-01-2020</td>
                            <td>10:00:00</td>
                        </tr>
                          <tr>
                            <td style="background: #800000; color:white; text-align: center;">1 C</td>
                            <td colspan="2">Pediculosis</td>
                            <td>24</td>
                            <td>14-01-2020</td>
                            <td>10:00:00</td>
                        </tr>
                          <tr>
                            <td style="background: #800000; color:white; text-align: center;">6 F</td>
                            <td colspan="2">Pediculosis</td>
                            <td>24</td>
                            <td>14-01-2020</td>
                            <td>10:00:00</td>
                        </tr>
                          <tr>
                            <td style="background: #800000; color:white; text-align: center;">5 A</td>
                            <td colspan="2">Pediculosis</td>
                            <td>24</td>
                            <td>14-01-2020</td>
                            <td>10:00:00</td>
                        </tr>
                          <tr>
                            <td style="background: #800000; color:white; text-align: center;">4 B</td>
                            <td colspan="2">Pediculosis</td>
                            <td>24</td>
                            <td>14-01-2020</td>
                            <td>10:00:00</td>
                        </tr>
                    </tbody>
                 </table>
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

</style>