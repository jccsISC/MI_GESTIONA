<template>
    <div class="container contentGeneral colorText">
        <div class="borderTitle">
            <h5>INFORMACIÓN PERSONAL</h5>
        </div>
        <div class="contentInf">
            <div v-if="alumno.IdAlumno" class="inforP">
                <div class="mifoto">
                    <img src="images/student.png" alt="Foto del Alumno">
                    <p class="text-center" style="text-shadow: 1px 1px 5px #2c2b2b86;">Regular</p>
                </div>

                <div class="subGrid">
                    <div>
                        <p class="m-0"><b>Matricula: </b>{{alumno.IdAlumno}}</p>
                        <p class="m-0"><b>Nombre: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                        <p class="m-0"><b>Fecha Nacimiento: </b>{{alumno.FechaNacimiento}}</p>
                        <p class="m-0"><b>Género: </b>{{alumno.Sexo == 'M' ? 'Masculino' : 'Femenino'}}</p>
                        <p class="m-0"><b>Telefóno: </b>{{alumno.Telefono}}</p>
                        <p class="m-0"><b>Telefóno2: </b>{{alumno.Telefono2 ? alumno.Telefono2 : ''}}</p>
                    </div>

                    <div>
                        <div class="linea"></div>
                        <p class="m-0"><b>CURP: </b>{{alumno.Curp}}</p>
                        <p class="m-0"><b>Correo: </b>{{alumno.EMAIL}}</p>
                        <p class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</p>
                        <p class="m-0"><b>Grado: </b>{{alumno.Grado}} Semestre</p>
                        <p class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</p>
                        <p class="m-0"><b>Turno: </b>{{alumno.Turno == 'M' ? 'Matutino' : 'Vespertino'}}</p>
                    </div>
                </div>

                <div>
                    <div class="linea"></div>
                    
                    <div>
                        <div class="text-center float">
                            <b><p>INFORMACIÓN DE LOS PADRES O TUTOR</p></b>
                        </div>
                        
                        <div class="subGrid">
                            <div v-for="(familiar, key) in familiares" :key="key">
                                <p class="m-0"><b>{{familiar.Tipo}}</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.Nombre}} {{familiar.ApePaterno}}  {{familiar.ApeMaterno}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.Telefono}}</p>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="labelS">
                <div v-if="alumno.IdAlumno" class="float">
                    <b><p>LUGRAR DE NACIMIENTO</p></b>
                </div>
                
                <div v-if="alumno.IdAlumno" class="inforP2">
                    <div>
                        <label class="mr-5"><b>Estado: </b>{{alumno.EstadoNac}}</label>
                        <label><b>Municipio: </b>{{alumno.MunicipioNac}}</label>
                        <p class="m-0"><b>Domicilio</b></p>
                        <label class="mr-5"><b>Calle: </b>{{alumno.Calle}}</label>
                        <label class="mr-5"><b>No. Exterior: </b>{{alumno.NumExterior}}</label>
                        <label class="mr-3"><b>No. Interior: </b>{{alumno.NumInterior == '' ? '' : alumno.NumInterior}}</label>
                        <label><b>CP: </b>{{alumno.CodPostal}}</label> <br>
                        <label class="mr-5"><b>Colonia: </b>{{alumno.Colonia}}</label>
                        <label class="mr-4"><b>Municipio: </b>{{alumno.Municipio}}</label>
                        <label class="mr-3"><b>Estado: </b>{{alumno.Estado}}</label><br>
                        <label class="mr-2"><b>Entre Calle: </b>{{alumno.EntreCalle ? alumno.EntreCalle :'No Capturada' }}</label>
                        <label><b>Entre Calle: </b>{{alumno.EntreCalle2 ? alumno.EntreCalle2 : 'No Capturada' }}</label>
                    </div>

                    <div>
                        <div class="linea"></div>
                        <label class="mr-5"><b>Tipo de Sangre: </b>{{alumno.TipoSangre}}</label>
                        <label class="mr-5"><b>Etnia: </b>{{alumno.Etnia ? alumno.Etnia : 'S/N'}}</label> <br>
                        <label class="mr-3"><b>Tipo de Afiliación: </b>No Capturado</label><br>
                        <label><b>NSS: </b> No Capturado</label><br>
                    </div>  
                </div>
            </div>
        </div>

        <div class="borderTitle">
            <h5>INFORMACIÓN ACADÉMICA - INASISTENCIAS</h5>
        </div>
        <div class="contentInf">
            <div class="gridM2">
                 
                <div v-if="alumno.IdAlumno" class="container contentCalif scrollTCalif">
                    <div>
                        <p><b>INFORMACIÓN ACADÉMICA DEL PLANTEL CECyTEJ 7</b></p>    
                        <p><b>Promedio General: </b> {{promedioGeneral}}</p>
                    </div>

                    <div class="tableCalf">
                        <table v-if="alumno.IdAlumno" class="table table-striped table-hover contentTable table table-sm">
                            <thead>
                                <tr>
                                    <th>Asignaturas</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                    <th>P4</th>
                                    <th>P5</th>
                                    <th>Promedio Final</th>
                                    <th>Ordinario</th>
                                    <th>Inter</th>
                                    <th>Extra</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <tr>
                                    <td colspan="7" class="text-center">Sin resultados...</td>
                                </tr>
                            </tbody>-->
                            <tbody>
                                <tr  v-for="(calificacion, key) in calificaciones" :key="key">
                                    <td>{{calificacion.Materia}}</td>
                                    <td v-for="i in 5" :key="i">{{unidad(calificacion.detalles, i)}}</td>
                                    <td>{{calificacion.Calificacionfinal}}</td>
                                    <td>{{calificacion.Extra ? calificacion.Extra : 'NC'}}</td>
                                    <td>{{calificacion.Inter ? calificacion.Inter : 'NC'}}</td>
                                    <td>{{calificacion.Ordinario ? calificacion.Ordinario : 'NC'}}</td>
                                </tr>                            
                            </tbody>
                        </table>
                    </div>
                </div>
               
                <div v-if="alumno.IdAlumno" class="container contentCalif pl-5 scrollTCalif">
                    <div>
                        <p><b>INFORMACIÓN SOBRE LAS FALTAS POR PARCIAL</b></p>
                        <p><b>POR MATERIA</b></p>
                    </div>

                    <div class="tableCalf">
                        <table v-if="alumno.IdAlumno" class="table table-striped table-hover contentTable table table-sm">
                            <thead>
                                <tr>
                                    <th>Asignaturas</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                    <th>P4</th>
                                    <th>P5</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <tr>
                                    <td colspan="7" class="text-center">Sin resultados...</td>
                                </tr>
                            </tbody>-->
                            <tbody>
                                <tr  v-for="(calificacion, key) in calificaciones" :key="key">
                                    <td>{{calificacion.Materia}}</td>
                                    <td v-for="i in 5" :key="i">{{unidad(calificacion.Inacistencias, i)}}</td>
                                </tr>                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="borderTitle">
            <h5>SALUD - INCIDENCIAS</h5>
        </div>
         <div class="contentInf">
            <div class="gridM2">
                 
                <div v-if="alumno.IdAlumno">
                    <div>
                        <p class="text-center"><b>SALUD</b></p>
                    </div>

                    <div>
                        <label class="mr-5"><b>Estatura: </b>{{salud.Estatura}}</label>
                        <label class="mr-5 ml-3"><b>Peso: </b>{{salud.Peso}}</label>
                        <label class="mr-5"><b>IMC: </b>{{salud.IMC}}</label><br>
                    </div>

                    <div class="gridM2">
                       <div class="contentDetSalud">
                            <p class="mb-1"><b>Anteojos: </b>{{salud.Anteojos == 1 ? 'Si' : 'No'}}</p>
                            <p class="mb-1"><b>Pie Plano: </b>{{salud.PiePlano == 1 ? 'Si' : 'No'}}</p>
                            <p class="mb-1"><b>ProbBucal: </b>{{salud.ProbBucal == 1 ? 'Si' : 'No'}}</p>
                            <p class="mb-1"><b>Pediculosis: </b>{{salud.Pediculosis == 1 ? 'Si' : 'No'}}</p>
                            <p class="mb-1"><b>ProbAuditivo: </b>{{salud.ProbAuditivo == 1 ? 'Si' : 'No'}}</p>
                            <p class="mb-1"><b>ProbLenguaje: </b>{{salud.ProbLenguaje == 1 ? 'Si' : 'No'}}</p>
                            <p class="mb-1"><b>Transtornos: </b>{{salud.Transtornos ? salud.Transtornos : 'No padece de transtornos...'}}</p>
                       </div>

                       <div class="contentDetSalud">
                            <p class="m-0"><b>Alergias: </b>{{salud.Alergias == 1 ? 'Si' : 'No'}}</p>
                            <p class="m-0"><b>Descripción: </b>{{salud.DetAlergias ? salud.DetAlergias : 'No tiene alergias...'}}</p>
                            <p class="m-0"><b>Gravidez: </b>{{salud.Gravidez == 1 ? 'Si' : 'No'}}</p>
                            <p class="m-0"><b>Descripción: </b>{{salud.Gravidez ? salud.DetGravidez : 'No tiene gravidez...'}}</p>
                            <p class="m-0"><b>Problemas Posturales: </b>{{salud.ProbPosturales == 1 ? 'Si' : 'No' }}</p>
                            <p class="m-0"><b>Descripción: </b>{{salud.DetProbPosturales ? salud.DetProbPosturales : 'No tiene problemas posturales...'}}</p>
                            <p class="m-0"><b>Otros: </b>{{salud.Otros == 1 ? 'Si' : 'No'}}</p>
                            <p class="m-0"><b>Descripción: </b>{{salud.DetOtros ? salud.DetOtros : 'No tiene otros...'}}</p>   
                       </div>
                    </div>
                </div>
               
                <div v-if="alumno.IdAlumno">
                    <div class="linea2"></div>
                    <div>
                        <p class="text-center"><b>INCIDENCIAS</b></p>
                    </div>

                    <div>
                        <div v-if="alumno.IdAlumno">
                            <div class="pt-1 interlineado">
                                <p><b>Cantidad de incidencias</b></p>
                                <div class="scrollH">
                                    <button 
                                        v-for="(incidencia, key) in incidencias" :key="key"  
                                        class="btn btn-danger btn-sm ml-1 p-0 pr-2 pl-2"
                                        data-toggle="modal" :data-target="incidencia.TipoReporte == 'Incidencia' ? '#verIncidencias' : '#verMalaConducta'" @click="$emit('verIncidencia', incidencia, alumno)">
                                    
                                        {{key + 1}}
                                    </button>
                                </div>
                            </div>

                            <div class="mcontenidoL pt-1 interlineado">
                                <p><b>Detalles</b></p> 
                                <p><b>Observaciones: </b>{{inconveniente.Observaciones}}</p>
                                <p><b>Descripción del Reporte: </b>{{inconveniente.DescripcionReporte}}</p>
                            </div>

                            <div class="pt-1">
                                <p class="p-0 m-0 fecha"><b>Fecha</b>{{inconveniente.FechaInicio}}</p>
                                <a :href="'/R?show='+alumno.IdAlumno"><img src="images/historial.png" alt="ver el historial" style="width: 20px; height: 20px;"></a>
                            </div>
                        </div>
                    </div>
                    <ver-mala-conducta></ver-mala-conducta>
                    <ver-incidencias></ver-incidencias>
                </div>
            </div>
        </div>

        <div class="borderTitle">
            <h5>TRABAJO SOCIAL</h5>
        </div>
        <div class="contentInf">
            <div class="gridTS">
                <div>
                    <div v-if="alumno.IdAlumno">
                        <div>
                            <p class="m-sm-1"><b>Justificantes</b></p>
                            <div class="scrollJ">
                                <button class="btn btn-danger btn-sm mr-1 p-0 pr-2 pl-2" 
                                v-for="(justificante, keyjustificantepase) in justificantes.slice().reverse()" :key="keyjustificantepase"  
                                data-toggle="modal" data-target="#addJustificantes" @click="$emit('verJustificante', justificante)">
                                    
                                    {{keyjustificantepase + 1}}

                                </button>
                            </div>
                        </div>
                        
                        <div>
                            <p class="mt-4"><b>Pases de Salida</b></p>
                            <div class="scrollJ">
                                <button class="btn btn-danger btn-sm mr-1 p-0 pr-2 pl-2" 
                                @click="$emit('verPase', pase)" v-for="(pase, keyjustificantepase2) in pases.slice().reverse()" 
                                :key="keyjustificantepase2" data-toggle="modal" data-target="#addJustificantes">
                            
                                    {{keyjustificantepase2+1}}
                            
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-4">
                    <div class="liena2"></div>
                    <div>
                        <div>
                            <div v-if="alumno.IdAlumno">
                                 <p><b>Servicio Social</b></p>
                                <div>
                                    <p class="mb-1"><b>Fecha Inicio: </b>N/C</p>
                                    <p class="mb-1"><b>Fecha Final: </b> N/C </p>
                                    <p class="mb-1"><b>Dependencia: </b></p>
                                    <p class="mb-1"><b>Nombre: </b> N/C </p>
                                    <p class="mb-1"><b>Giro: </b> N/C </p>
                                    <p class="mb-1"><b>Dirección: </b> N/C </p>
                                    <p class="mb-1"><b>Telefóno: </b> N/C </p>
                                    <p class="mb-1"><b>Responsable: </b> N/C </p>
                                    <p class="mb-1"><b>Tipo de Vinculación: </b> N/C </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="liena2"></div>
                    <div v-if="alumno.IdAlumno">
                        <p><b>Practicas Profesionales</b></p>
                        <div>
                            <p class="mb-1"><b>Fecha Inicio: </b> N/C </p>
                            <p class="mb-1"><b>Fecha Final: </b> N/C </p>
                            <p class="mb-1"><b>Dependencia: </b></p>
                            <p class="mb-1"><b>Nombre: </b> N/C </p>
                            <p class="mb-1"><b>Giro: </b> N/C </p>
                            <p class="mb-1"><b>Dirección: </b> N/C </p>
                            <p class="mb-1"><b>Telefóno: </b> N/C </p>
                            <p class="mb-1"><b>Responsable: </b> N/C </p>
                            <p class="mb-1"><b>Tipo de Vinculación: </b> N/C </p>
                        </div>
                    </div>
                </div>

                <div v-if="alumno.IdAlumno" class="ml-5">
                    <p><b>Becas</b></p>
                    <div v-for="(beca, key) in becas" :key="key">
                        <p class="mb-1"><b>Nombre: </b>{{beca.Nombre}} </p>
                        <p class="mb-3"><b>Tipo: </b>{{beca.Tipo}}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <add-justificante></add-justificante>
    </div>
</template>

<script>
    import bus from '../../event-bus';

    export default {
        data() {
            return {
                alumno: {},
                salud: {},
                practica: {},
                familiares: [],
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
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarCalificaciones();
                this.jalarFamiliares();
                this.jalarSalud();
                this.jalarIncidencias();
                this.jalarJustificantes();
                this.jalarPases();
                this.jalarPractica();
                this.jalarBecas();
                this.jalarFaltas();
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

            jalarFaltas(){
                axios.get('faltas/'+this.alumno.IdAlumno+'/faltas').then(res =>{
                    console.log(res.data);
                    // this.faltas = res.data;
                });
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
            jalarFamiliares() {
                axios.get('alumnos/'+this.alumno.IdAlumno+'/familiares').then(res=>{
                    this.familiares = res.data;
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
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/practica?tipo='+this.tipo).then(res => {
                    this.practica = res.data;
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
        },
        props: ['tipo']
    }
</script>
   
<style>
    .contentGeneral{
        width: 100%; 
        height: 620px;
        background: rgba(247, 247, 247, 0.418);
        border: 2px solid rgb(202, 201, 201);
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 15px;
        margin-top: 80px;
        overflow: scroll;
        overflow: auto;
    }

    .contentGeneral::-webkit-scrollbar{
        width: 3px;
    }

    .contentGeneral::-webkit-scrollbar-thumb{
        width: 3px;
        background: #800000;
    }

    .contentDetSalud{
        height: 225px;
        /* background: #eeeeee; */
        overflow: scroll;
        overflow: auto;
        margin-right: 5px;
    }

    .contentDetSalud::-webkit-scrollbar{
        width: 1px;
    }

    .contentDetSalud::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
    }

    .scrollH{
        width: 525px;
        background: rgba(247, 247, 247, 0.418);
        /* border: 2px solid rgb(202, 201, 201); */
        border-radius: 3px;
        overflow-x: auto;
        /* overflow-x: scroll; */
        white-space: nowrap;
    }

    .scrollH::-webkit-scrollbar{
        width: 1px;
        height: 1px;
    }

    .scrollH::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
    }

    .scrollJ{
        width: 260px;
        height: 100px;
        background: rgba(247, 247, 247, 0.418);
        border: 1px solid rgb(202, 201, 201);
        border-radius: 3px;
        padding: 5px;
        overflow: scroll;
        overflow:auto;
    }

    .scrollJ::-webkit-scrollbar{
        width: 1px;
    }

    .scrollJ::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
    }

    .contentGeneral p{
        font-size: 14px;
    }
    

    .contentInf{
        width: 100%;
        height: 300px;
        background: white;
        border: 1px solid rgb(165, 164, 164);
        border-radius: 3px;
        /* box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.4); */
        padding: 10px;
        margin: 0;
        margin-bottom: 15px;
    }
    
    .borderTitle{
        width: 100%;
        height: 30px;
        background: #d1d1d1;
        border: 1px solid rgb(141, 141, 141);
        border-radius: 3px;
        text-align: center;
        font-size: 14px;
        margin-bottom: 3px;
        color: #800000;
    }

    .inforP{
        display: grid;
        grid-template-columns: 1fr 4fr 4fr;
        grid-template-rows: 135px;
    }

    .inforP2{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 135px;
    }

    .subGrid{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 135px;
    }

    .mifoto{
        width: 100px;
        height: 100px;
        border-radius: 8px;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
        float: left;
    }
    img{
        width: 100%;
    }

    .linea{
        border-left: 1px solid rgb(136, 136, 136);
        height: 100px;
        float: left;
        margin-top: 20px;
        margin-right: 10px;
    }

    .linea2{
        border-left: 1px solid rgb(136, 136, 136);
        height: 220px;
        float: left;
        margin-top: 30px;
        margin-right: 15px;
    }

    .labelS{
        font-size: 14px;
    }

    .gridM2{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .contentCalif{
        height: 280px;
        /* border: 1px solid rgb(202, 201, 201); */
    }

    .tableCalf{
        border: 1px solid rgb(202, 201, 201);
        border-radius: 4px;
    }

    .gridTS{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 280px;
    }

    
</style>