<template>
    <div class="contenedorCard">
        <p class="subtitulos">Incidencias</p>
        <div class="micard">
            <div v-if="alumno.IdAlumno">
                <div class="pt-1 interlineado">
                    <p><b>Cantidad de incidencias</b></p>
                    <button 
                        v-for="(incidencia, key) in incidencias" :key="key"  
                        class="btn btn-danger btn-sm ml-1 p-0 pr-2 pl-2"
                        data-toggle="modal" data-target="#verIncidencias" @click="$emit('verIncidencia', incidencia, alumno)">
                    
                        {{key + 1}}

                    </button>
                </div>

                <div class="mcontenidoL pt-1 interlineado">
                    <p><b>Detalles</b></p>
                    <p><b>Tipo de Falta: </b>{{inconveniente.TipoFalta}}</p>
                    <p><b>Seguimiento: </b>{{inconveniente.Status ? 'Concluido' : 'Pendiente'}}</p>
                    <p><b>Observaciones: </b>{{inconveniente.Observaciones}}</p>
                    <p><b>Descripción del Reporte: </b>{{inconveniente.DescripcionReporte}}</p>
                </div>

                <div class="pt-1">
                    <p class="p-0 m-0 fecha"><b>Fecha</b>{{inconveniente.FechaInicio}}</p>
                    <a href="/R"><img src="images/historial.png" alt="ver el historial" style="width: 20px; height: 20px;"></a>
                </div>
            </div>
        </div>

        <ver-incidencias></ver-incidencias>
    </div>
</template>

<script>
   
    import bus from '../../../event-bus';
    export default {
        computed: {
            inconveniente() {
                return this.incidencias[0] ? this.incidencias[0] : {};
            }
        },
        data() {
            return {
                alumno: {},
                incidencias: []
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarIncidencias();
            });

            bus.$on('incidenciaAgregada', incidencia => {
                this.incidencias.unshift(incidencia);
            });
        },
        methods:{
            jalarIncidencias(){
                axios.get('/incidencias/'+this.alumno.IdAlumno).then(res => {
                    this.incidencias = [];
                    res.data.forEach(i => {
                        this.incidencias.unshift(i);
                    });
                });
            }
        }
    
    }
</script>

<style>

    .mcontenidoL{
        width: 75%;
        float: left;
        padding: 0;
        /* overflow: hidden; */
    }

    .fecha{
        font-size: 11px;
    }

</style>