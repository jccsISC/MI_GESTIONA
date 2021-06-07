<template>
    <div>
        <div class="modal fade" id="allinfo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-centered modal-lg modal-dialog-scrollable"  role="document">
                <div class="modal-content">
                    <div>
                        <div class="float-left" style="margin-left: 35%;">
                            <p class="subtitulos text-center">Información general del alumno</p>
                        </div>
                        
                        <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                            <span style="color: #800000">&times;</span>
                        </button>
                    </div>
                    
                    <hr class="mt-1 m-0 p-0">

                    <div class="modal-body-g2 sizeGeneral">
                        <!-- Informacion personal -->
                        <p class="subtitulos">Información personal</p>
                        <hr class="barrasubtitulos">
                        <div id="info-personal" v-if="alumno.IdAlumno">
                            <div class="uno text-center" >
                                <img src="images/student.png" alt="Foto del Alumno" style="width: 100px; height: 100px;">
                                <p style="text-shadow: 1px 1px 5px #2c2b2b86;">Regular</p>
                            </div>
                            <div class="dos">
                                <p class="m-0"><b>Matricula: </b>{{alumno.IdAlumno}}</p>
                                <p class="m-0"><b>Nombre: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                                <p class="m-0"><b>Fecha nacimiento: </b>{{alumno.FechaNacimiento}}</p>
                                <p class="m-0"><b>Género: </b>{{alumno.Sexo == 'M' ? 'Masculino' : 'Femenino'}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{alumno.Telefono}}</p>
                                <p class="m-0"><b>Telefóno 2: </b>{{alumno.Telefono2 ? alumno.Telefono2 : ''}}</p>
                            </div>
                            <div class="tres pl-2">
                                <p class="m-0"><b>CURP: </b>{{alumno.Curp}}</p>
                                <p class="m-0"><b>Correo: </b>{{alumno.EMAIL}}</p>
                                <p class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</p>
                                <p class="m-0"><b>Grado: </b>{{alumno.Grado}} Semestre</p>
                                <p class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</p>
                                <p class="m-0"><b>Turno: </b>{{alumno.Turno == 'M' ? 'Matutino' : 'Vespertino'}}</p>
                            </div>
                            <div class="cuatro pl-2">
                                <div class="text-center float">
                                    <b><p>INFORMACIÓN DE LOS PADRES O TUTOR</p></b>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                        <p class="m-0"><b>Padre</b></p>
                                        <p class="m-0"><b>Nombre: </b>{{familiar.NombrePadre}} {{familiar.ApePaternoPadre}}  {{familiar.ApeMaternoPadre}}</p>
                                        <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                                    </div>
                                    <div class="col">
                                        <p class="m-0"><b>Madre</b></p>
                                        <p class="m-0"><b>Nombre: </b>{{familiar.NombreMadre}} {{familiar.ApePaternoMadre}}  {{familiar.ApeMaternoMadre}}</p>
                                        <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cinco">
                                <b><p class="m-0 p-0">Lugar de nacimiento</p></b>
                                <label class="m-0 mr-5"><b>Estado: </b>{{alumno.EstadoNac}}</label>
                                <label><b>Municipio: </b>{{alumno.MunicipioNac}}</label>
                                <p class="m-0 p-0"><b>Domicilio</b></p>
                                <label class="m-0 mr-2"><b>Calle: </b>{{alumno.Calle}}</label>
                                <label class="m-0 mr-2"><b>No. Exterior: </b>{{alumno.NumExterior}}</label>
                                <label class="m-0 mr-2"><b>No. Interior: </b>{{alumno.NumInterior == '' ? '' : alumno.NumInterior}}</label>
                                <label class="m-0"><b>CP: </b>{{alumno.CodPostal}}</label> <br>
                                <label class="m-0 mr-3"><b>Colonia: </b>{{alumno.Colonia}}</label>
                                <label class="m-0 mr-3"><b>Municipio: </b>{{alumno.Municipio}}</label>
                                <label class="m-0 mr-2"><b>Estado: </b>{{alumno.Estado}}</label><br>
                                <label class="m-0 mr-1"><b>Entre calle: </b>{{alumno.EntreCalle ? alumno.EntreCalle :'No Capturada' }}</label>
                                <label class="m-0"><b>Entre calle: </b>{{alumno.EntreCalle2 ? alumno.EntreCalle2 : 'No Capturada' }}</label>
                            </div>
                            <div class="seis pl-2">
                                <label class="m-0 mr-5"><b>Tipo de sangre: </b>{{alumno.TipoSangre}}</label>
                                <label class=""><b>Etnia: </b>{{alumno.Etnia ? alumno.Etnia : 'S/N'}}</label> <br>
                                <label class="m-0"><b>Tipo de afiliación: </b>No capturado</label><br>
                                <label class="m-0"><b>NSS: </b> No capturado</label><br>
                            </div>
                        </div>

                        <!-- Informacion academica -->
                        <p class="subtitulos text-center">Información académica</p>
                        <hr class="barrasubtitulos">
                        <div id="div-info" class="contenedorVentanaModal colorText sizeGeneral" style="overflow-x:auto">
                            <div class="row" style="float: left; width: 100%; margin-left: -10px;">
                                <div class="col pr-0">
                                    <div v-if="alumno.IdAlumno" class="header">
                                        <p class="m-0 p-0"><b>INFORMACIÓN ACADÉMICA DEL PLANTEL CECyTEJ 7</b></p>    
                                        <p class="m-0 p-0"><b>Promedio general: </b> {{promedioGeneral}}</p>
                                    </div>
                                    <table class="table table-striped table-hover table-sm text-center">
                                    <thead class="table-header-color">
                                        <tr class="table-header-color">
                                            <th style="width: 200px">Asignaturas</th>
                                            <th>P1</th>
                                            <th>P2</th>
                                            <th>P3</th>
                                            <th>P4</th>
                                            <th>P5</th>
                                            <th>P.Final</th>
                                            <th>Ordinario</th>
                                            <th>Inter</th>
                                            <th>Extra</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: 1px solid #800000;">
                                        <tr v-for="(calificacion, key) in calificaciones" :key="key">
                                            <td style="width: 200px">{{calificacion.Materia}}</td>
                                            <td v-for="i in 5" :key="i">{{unidad(calificacion.detalles, i)}}</td>
                                            <td>{{calificacion.Calificacionfinal}}</td>
                                            <td>{{calificacion.Ordinario ? calificacion.Ordinario : 'NC'}}</td>
                                            <td>{{calificacion.Inter ? calificacion.Inter : 'NC'}}</td>
                                            <td>{{calificacion.Extra ? calificacion.Extra : 'NC'}}</td>
                                        </tr>                            
                                    </tbody>
                                </table>
                                </div>
                                <div class="col pr-0" >
                                    <div class="header">
                                            <p class="m-0 p-0"><b>INFORMACIÓN SOBRE LAS FALTAS POR PARCIAL</b></p>
                                            <p class="m-0 p-0"><b>POR MATERIA</b></p>
                                        </div>
                                        <table v-if="alumno.IdAlumno" class="table table-striped table-hover table table-sm table-padding">
                                            <thead class="table-header-color">
                                                <tr class="table-header-color">
                                                    <th>Asignaturas</th>
                                                    <th>P1</th>
                                                    <th>P2</th>
                                                    <th>P3</th>
                                                    <th>P4</th>
                                                    <th>P5</th>
                                                </tr>
                                            </thead>

                                            <tbody style="border: 1px solid #800000;">
                                                <tr  v-for="(falta, key) in faltas" :key="key">
                                                    <td>{{falta.horario_maestro.Materia}}</td>
                                                    <td v-for="i in 5" :key="i">{{faltasPorUnidad(falta.parciales, i)}}</td>
                                                </tr>                                                         
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Salud - Incidencias -->
                        <p class="subtitulos text-center">Salud - Incidencias</p>
                        <hr class="barrasubtitulos">
                        <div id="salud-incidencias">
                            <div id="divSalud" v-if="alumno.IdAlumno">
                                <div class="header">
                                    <div>
                                        <p class="text-center p-0 m-0"><b>SALUD</b></p>
                                    </div>
                                    <div>
                                        <label class="mr-5 m-0"><b>Estatura: </b>{{salud.Estatura}}</label>
                                        <label class="mr-4 m-0"><b>Peso: </b>{{salud.Peso}}</label>
                                        <label class="m-0"><b>IMC: </b>{{salud.IMC}}</label><br>
                                    </div>
                                </div>
                                <div class="left">
                                    <p class="mb-1"><b>Anteojos: </b>{{salud.Anteojos == 1 ? 'Si' : 'No'}}</p>
                                    <p class="mb-1"><b>Pie Plano: </b>{{salud.PiePlano == 1 ? 'Si' : 'No'}}</p>
                                    <p class="mb-1"><b>Salud bucal: </b>{{salud.ProbBucal == 1 ? 'Si' : 'No'}}</p>
                                    <p class="mb-1"><b>Pediculosis: </b>{{salud.Pediculosis == 1 ? 'Si' : 'No'}}</p>
                                    <p class="mb-1"><b>Problemas auditivo: </b>{{salud.ProbAuditivo == 1 ? 'Si' : 'No'}}</p>
                                    <p class="mb-1"><b>Problemas lenguaje: </b>{{salud.ProbLenguaje == 1 ? 'Si' : 'No'}}</p>
                                    <p class="mb-1"><b>Transtornos: </b>{{salud.Transtornos ? salud.Transtornos : 'No padece de transtornos...'}}</p>
                                </div>
                                <div class="right">
                                    <p class="m-0"><b>Alergias: </b>{{salud.Alergias == 1 ? 'Si' : 'No'}}</p>
                                    <p class="m-0"><b>Descripción: </b>{{salud.DetAlergias ? salud.DetAlergias : 'No tiene alergias...'}}</p>
                                    <p class="m-0"><b>Gravidez: </b>{{salud.Gravidez == 1 ? 'Si' : 'No'}}</p>
                                    <p class="m-0"><b>Descripción: </b>{{salud.Gravidez ? salud.DetGravidez : 'No tiene gravidez...'}}</p>
                                    <p class="m-0"><b>Problemas posturales: </b>{{salud.ProbPosturales == 1 ? 'Si' : 'No' }}</p>
                                    <p class="m-0"><b>Descripción: </b>{{salud.DetProbPosturales ? salud.DetProbPosturales : 'No tiene problemas posturales...'}}</p>
                                    <p class="m-0"><b>Otros: </b>{{salud.Otros == 1 ? 'Si' : 'No'}}</p>
                                    <p class="m-0"><b>Descripción: </b>{{salud.DetOtros ? salud.DetOtros : 'No tiene otros...'}}</p>  
                                </div>
                            </div>
                            <div id="divIncidencia" v-if="alumno.IdAlumno">
                                <div class="header">
                                    <p class="text-center p-0 m-0"><b>INCIDENCIAS</b></p>
                                </div>
                                <div class="left">
                                    <p class="p-0 m-0"><b>Incidencias</b></p>
                                    <div class="borde pt-1">
                                        <button 
                                            v-for="(incidencia, key) in incidencias" :key="key"  
                                            class="btn btn-danger btn-sm ml-1 p-0 pr-2 pl-2"
                                            data-toggle="modal" :data-target="incidencia.TipoReporte == 'Incidencia' ? '#verIncidencias' : '#verMalaConducta'" @click="mostrarIncidencia(incidencia, alumno)">
                                        
                                            {{key + 1}}
                                        </button>
                                    </div>
                                    
                                    <b>Mala conducta</b>
                                    <div class="borde pt-1">
                                        <button 
                                            v-for="(incidencia, key) in malaConductaComputed" :key="key"
                                            class="btn btn-danger btn-sm m-0 mt-1 ml-1 p-0 pr-2 pl-2"
                                            data-toggle="modal" :data-target="'#verMalaConducta'" @click="mostrarIncidencia(incidencia, alumno)">
                                            {{key + 1}}
                                        </button>
                                    </div>
                                </div>
                                <div class="right pl-1">
                                    <b>Yo no abandono</b>
                                    <div class="borde">
                                        <button 
                                            v-for="(incidencia, key) in malaConductaComputed" :key="key"
                                            class="btn btn-danger btn-sm m-0 mt-1 ml-1 p-0 pr-2 pl-2"
                                            data-toggle="modal" :data-target="'#verMalaConducta'" @click="mostrarIncidencia(incidencia, alumno)">
                                            {{key + 1}}
                                        </button>
                                    </div>
                                </div>

                                <div class="right text-center">
                                    <!-- <p class="p-0 m-0 fecha"><b>Fecha: </b>{{inconveniente.FechaInicio}}</p> -->
                                </div>
                            </div>
                            <a class="float-right" :href="'/R?show='+alumno.IdAlumno"><img src="images/historial.png" alt="ver el historial" style="width: 20px; height: 20px;"></a>

                        </div>
                        <p class="subtitulos text-center">Trabajo social</p>
                        <hr class="barrasubtitulos">
                        <div class="contenedorVentana colorText sizeGeneral" id="divSocial">
                            <div id="trabajo-social">
                                <div class="left">
                                    <div v-if="alumno.IdAlumno" style="padding: 10px">
                                        <div>
                                            <p class="m-sm-1"><b>Justificantes</b></p>
                                            <div class="miCard" style="min-height: 53px;">
                                                <button class="btn btn-danger btn-sm m-1 p-0 pr-2 pl-2" 
                                                v-for="(justificante, keyjustificantepase) in justificantes.slice().reverse()" :key="keyjustificantepase"  
                                                data-toggle="modal" data-target="#addJustificantes" @click="mostrarJustificante(justificante)">
                                                    
                                                    {{keyjustificantepase + 1}}

                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <p class="mt-4"><b>Pases de salida</b></p>
                                            <div class="miCard" style="min-height: 53px;">
                                                <button class="btn btn-danger btn-sm m-1 p-0 pr-2 pl-2" 
                                                @click="$emit('verPase', pase)" v-for="(pase, keyjustificantepase2) in pases.slice().reverse()" 
                                                :key="keyjustificantepase2" data-toggle="modal" data-target="#addJustificantes">
                                            
                                                    {{keyjustificantepase2+1}}
                                            
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="liena2"></div>
                                    <div>
                                        <div v-if="alumno.IdAlumno">
                                            <p><b>SERVICIO SOCIAL</b></p>
                                            <div>
                                                <p class="mb-1"><b>Fecha inicio: </b>{{servicio.FechaInicio ? servicio.FechaInicio : 'NC'}}</p>
                                                <p class="mb-1"><b>Fecha final: </b>{{servicio.FechaFin ? servicio.FechaFin : 'NC'}}</p>
                                                <p class="mb-1"><b>Dependencia: </b>{{servicio.IdServPrac ? servicio.dependencia.Nombre : 'NC'}}</p>
                                                <p class="mb-1"><b>Giro: </b>{{servicio.IdServPrac ? servicio.dependencia.Giro : 'NC'}}</p>
                                                <p class="mb-1"><b>Dirección: </b>{{servicio.IdServPrac ? servicio.dependencia.Direccion : 'NC'}}</p>
                                                <p class="mb-1"><b>Telefóno: </b>{{servicio.IdServPrac ? servicio.dependencia.Telefono : 'NC'}}</p>
                                                <p class="mb-1"><b>Responsable: </b>{{servicio.IdServPrac ? servicio.dependencia.Responsable : 'NC'}}</p>
                                                <p class="mb-1"><b>Tipo de vinculación: </b>{{servicio.IdServPrac ? servicio.dependencia.TipoVinculacion : 'NC'}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="liena2"></div>
                                    <div v-if="alumno.IdAlumno">
                                        <p><b>PRACTICAS PROFESIONALES</b></p>
                                        <div>
                                            <p class="mb-1"><b>Fecha inicio: </b>{{practica.FechaInicio ? practica.FechaInicio : 'NC'}}</p>
                                            <p class="mb-1"><b>Fecha final: </b>{{practica.FechaFin ? practica.FechaFin : 'NC'}}</p>
                                            <p class="mb-1"><b>Dependencia: </b>{{practica.IdServPrac ? practica.dependencia.Nombre : 'NC'}}</p>
                                            <p class="mb-1"><b>Giro: </b>{{practica.IdServPrac ? practica.dependencia.Giro : 'NC'}}</p>
                                            <p class="mb-1"><b>Dirección: </b>{{practica.IdServPrac ? practica.dependencia.Direccion : 'NC'}}</p>
                                            <p class="mb-1"><b>Telefóno: </b>{{practica.IdServPrac ? practica.dependencia.Telefono : 'NC'}}</p>
                                            <p class="mb-1"><b>Responsable: </b>{{practica.IdServPrac ? practica.dependencia.Responsable : 'NC'}}</p>
                                            <p class="mb-1"><b>Tipo de vinculación: </b>{{practica.IdServPrac ? practica.dependencia.TipoVinculacion : 'NC'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <p><b>BECAS</b></p>
                                    <div v-for="(beca, key) in becas" :key="key">
                                        <p class="mb-1"><b>Nombre: </b>{{beca.Nombre}} </p>
                                        <p class="mb-3"><b>Tipo: </b>{{beca.Tipo}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ver-mala-conducta></ver-mala-conducta>
        <ver-incidencias></ver-incidencias>
        <add-justificante :role="role"></add-justificante>
    </div>
 
</template>

<script>
    import bus from '../../event-bus';

    export default {
        props: ['tipo', 'role'],
        data() {
            return {
                alumno: {},
                salud: {},
                practica: {},
                servicio: {},
                familiar: {},
                calificaciones: [],
                becas: [],
                incidencias: [],
                justificantes: [],
                pases: [],
                contador:0,
                faltas: ''
            }
        },
        created() {
            console.log(this.role);
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarCalificaciones();
                this.jalarFamiliar();
                this.jalarSalud();
                this.jalarIncidencias();
                this.jalarJustificantes();
                this.jalarPases();
                this.jalarPractica();
                this.jalarServicio();
                this.jalarBecas();
                this.jalarFaltas();
            });

            bus.$on('incidenciaEditada', info => {

               console.log('incidencias que ya tengo', this.incidencias);
               // incidencias [{idIncidencia: 11, description: "hola"}, {idIncidencia: 12, description: "hola"}, {idIncidencia: 13, description: "hola"}]
               console.log('lo que estoy recibiendo', info);
               // info {idIncidencia: 11, description: "hola actualizado"}
                
                const nuevasIncidencias = [];


               this.incidencias.forEach((i) => {
                    if (i.idIncidencia == info.idIncidencia) {
                        nuevasIncidencias.push(info);
                    } else {
                        nuevasIncidencias.push(i);
                    }
               });

               this.incidencias = nuevasIncidencias;
            });

        },
        computed:{
            promedioGeneral() {
                let promedio = 0;
                let counter = 0;
                let general = 0;
                if (!this.calificaciones.length) {
                    return '';
                }
                this.calificaciones.forEach(calificacion => {
                    promedio += calificacion.Calificacionfinal ? parseInt(calificacion.Calificacionfinal) : 0;
                    counter++;
                });
                
                general = promedio/counter;
                return general.toFixed(1);
            },
            inconveniente() {
                return this.incidencias[0] ? this.incidencias[0] : {};
            }
         },
        methods:{
            mostrarJustificante(justificante) {
                bus.$emit('verJustificante', justificante);
            },
            mostrarIncidencia(incidencia, alumno) {
                bus.$emit('verIncidencia', incidencia, alumno);
            },
            jalarFaltas(){
                axios.get('faltas/'+this.alumno.IdAlumno).then(res =>{
                    this.faltas = res.data;
                });
            },
            faltasPorUnidad(parciales, unidad) {
                let faltas = '';
                if (!parciales) {
                    return faltas;
                }
                const unidades = Object.keys(parciales);
                unidades.forEach(parcial => {
                    if (parcial == unidad) {
                        faltas = parciales[parcial].length;
                        return;
                    }
                });

                return faltas;
            },
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
            },
            jalarFamiliar() {
                axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar').then(res=>{
                    this.familiar = res.data;
                    console.log(res);
                });
            },
            jalarSalud() {
                axios.get('/salud/'+this.alumno.IdAlumno).then(res => {
                    this.salud = res.data;
                });
            },
            jalarIncidencias() {
                axios.get('/incidencias/'+this.alumno.IdAlumno).then(res => {
                    this.incidencias = [];
                    res.data.forEach(i => {
                        this.incidencias.unshift(i);
                    });
                });
            },
            jalarPases() {
                axios.get('/trabajosocial/' + this.alumno.IdAlumno + '/pases').then(res => {
                    this.pases = res.data;
                    console.log(res.data);
                });
            },
            jalarJustificantes() {
                axios.get('/trabajosocial/' + this.alumno.IdAlumno + '/justificantes').then(res => {
                    this.justificantes = res.data;
                    console.log(res.data);
                });
            },
            jalarPractica() {
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/practica?tipo=pp').then(res => {
                    this.practica = res.data;
                    console.log(res);
                })
                .catch();
            },
            jalarServicio() {
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/practica?tipo=ss').then(res => {
                    this.servicio = res.data;
                    console.log(res);
                })
                .catch();
            },
            jalarBecas() {
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/becas').then(res => {
                    this.becas = res.data;
                    console.log(res);
                });
            }
        }
    }
</script>

<style>
    .subtitulos {
       text-align: center;
    }

     .contenedorVentanaModal{
        height: 300px;
        border-radius: 4px;
        border: 2px solid rgb(223, 219, 219);
        margin-left: 1%;
        margin-right: 1%;
        padding: 10px;
    }

    .sizeGeneral {
        font-size: 12px;
    }

    .inforPG{
        display: grid;
        grid-template-columns: 1fr 7fr 4fr;
        grid-template-rows: 120px;
    }

    .inforP2G{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 120px;
    }

    .mifotoG {
        width: 80px;
        height: 80px;
        border-radius: 6px;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
        float: left;
    }

    img{
        width: 100%;
    }
    .miCard{
        height: auto;
        padding: 10px;
        background: rgba(247, 247, 247, 0.418);
        border: 1px solid rgb(202, 201, 201);
        border-radius: 3px;
    }
    .miCard button{
        width: auto;
    }

    .subGrid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 135px;
    }

    .lineaG {
        border-left: 1px solid rgb(136, 136, 136);
        height: 80px;
        float: left;
        margin-top: 15px;
        margin-right: 10px;
    }

    .gridM2G {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    
    .contentCalifG {
        height: 160px;
        border: 1px solid rgb(202, 201, 201);
    }

    .scrollT tbody,
    .scrollT thead { 
        display: block;     
    }

     .scrollT thead tr th { 
        width: 5%;
        height: 20px;
        line-height: 20px;
    }

    .scrollT tbody tr td { 
        width: 10%;
        height: 20px;
        line-height: 20px;
    }

    .scrollT tbody {
        max-height: 165px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .scrollT tbody::-webkit-scrollbar {
        width: 1px;
    }

    .scrollT tbody::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
    }

    .contentDetSaludG {
        height: 160px;
        /* background: #eeeeee; */
        overflow: scroll;
        overflow: auto;
        margin-right: 5px;
    }

    .contentDetSaludG::-webkit-scrollbar {
        width: 1px;
    }

    .contentDetSaludG::-webkit-scrollbar-thumb {
        width: 1px;
        background: #800000;
    }

    .linea2G{
        border-left: 1px solid rgb(136, 136, 136);
        height: 150px;
        float: left;
        margin-top: 35px;
        margin-right: 10px;
    }


    .scrollHG {
        width: 330px;
        background: rgba(247, 247, 247, 0.418);
        /* border: 2px solid rgb(202, 201, 201); */
        border-radius: 3px;
        overflow-x: auto;
        /* overflow-x: scroll; */
        white-space: nowrap;
    }

    .scrollHG::-webkit-scrollbar {
        width: 1px;
        height: 4px;
    }

    .scrollHG::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
    }

</style>