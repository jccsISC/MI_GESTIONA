<template>
    <div>
        <div class="contenedorCard">
            <p class="subtitulos">Incidencias</p>
            <div class="micard">
                <div id="card-incidencias" v-if="alumno.IdAlumno">
                    <div class="pt-1 uno">
                        <a :href="'/R?show='+alumno.IdAlumno"><img src="images/historial.png" class="float-right mr-2" alt="ver el historial" style="width: 20px; height: 20px;"></a>
                        
                        <label><b>Cantidad de incidencias</b></label>
                        <div class="borde">
                            <button 
                                v-for="(incidencia, key) in incidenciasComputed" :key="key"
                                class="btn btn-danger btn-sm m-0 mt-1 ml-1 p-0 pr-2 pl-2"
                                data-toggle="modal" :data-target="'#verIncidencias'" @click="mostrarIncidencia(incidencia, alumno)">
                            
                                {{key + 1}}

                            </button>
                        </div>
                        <label class="mt-2"><b>Mala conducta</b></label>
                        <div class="borde">
                            <button 
                                v-for="(incidencia, key) in malaConductaComputed" :key="key"
                                class="btn btn-danger btn-sm m-0 mt-1 ml-1 p-0 pr-2 pl-2"
                                data-toggle="modal" :data-target="'#verMalaConducta'" @click="mostrarIncidencia(incidencia, alumno)">
                            
                                {{key + 1}}

                            </button>
                        </div>
                    </div>

                    <!-- <div class="mcontenidoL pt-1 dos"> -->
                        <!-- <p><b>Detalles</b></p>
                        <p><b>Observaciones: </b>{{inconveniente.Observaciones}}</p>
                        <p><b>Descripción del reporte: </b>{{inconveniente.DescripcionReporte}}</p> -->
                         <!-- <p class="p-0 m-0 fecha"><b>Fecha: </b>{{inconveniente.FechaInicio}}</p> -->
                        
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- <ver-mala-conducta></ver-mala-conducta>
        <ver-incidencias></ver-incidencias> -->
    </div>
</template>

<script>
   
    import bus from '../../../event-bus';
    export default {
        
        data() {
            return {
                alumno: {},
                incidencias: []
            }
        },
        computed: {
            inconveniente() {
                return this.incidencias[0] ? this.incidencias[0] : {};
            },
            incidenciasComputed() {
                return this.incidencias.filter(incidencia => incidencia.TipoReporte === 'Incidencia');
            },
            malaConductaComputed() {
                return this.incidencias.filter(incidencia => incidencia.TipoReporte !== 'Incidencia');    
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
            bus.$on('incidenciaEditada', incidencia => {
                const temp = Object.assign({}, this.incidencias);
                this.incidencias = [];
                Object.keys(temp).forEach(key => {
                    if (temp[key].IdIncidencia === incidencia.IdIncidencia) {
                        this.incidencias[key] = incidencia;
                    }
                    else {
                        this.incidencias[key] = temp[key];
                    }
                });
            });
            
        },
        methods:{
            mostrarIncidencia(incidencia, alumno) {
                console.log('mostrando incidencias', incidencia)
                bus.$emit('verIncidencia', incidencia, alumno);
            },
            jalarIncidencias() {
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


    .borde {
        width: 98%;
        height: 80px;
        border:1px solid #a5a5a5;
        border-radius: 4px;
        overflow: auto;
        padding: 5;
        margin: 0;
    }

    .borde::-webkit-scrollbar {
        width: 1px;
    }

    .borde::-webkit-scrollbar-thumb {
        width: 1px;
        background: #800000;
    }

</style>