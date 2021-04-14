<template>
    <div class="modal fade" role="dialog" tabindex="-1" id="reporteConducta" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div>
                    <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                        <p class="subtitulos text-center">Reporte de mala conducta</p>
                    </div>
                    
                    <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                        <span style="color: #800000">&times;</span>
                    </button>
                </div>

                <div class="modal-body-g  p-3 bordeReport colorText">
                    <div class="imageLogo">
                        <img src="images/logo.jpg" alt="">
                    </div>

                    <div class="float-right mt-5">
                        <button  class="btn btn-success m-0 p-0 pr-2 pl-2" @click="incidencia.Status = 1"><i class="fas fa-check"></i></button>
                        <button  class="btn btn-warning m-0 p-0 pr-2 pl-2" @click="incidencia.Status = 0"><i class="fas fa-exclamation-triangle"></i></button>
                    </div>

                    <div class="text-center">
                        <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
                        <p class="m-0" style="padding-right:110px;">PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
                        <p class="m-0" style="text-decoration: underline; padding-left:80px;">FORMATO YO NO ABANDONO</p>
                        <p class="m-0" style="padding-left:80px;">SEGUIMIENTO Y DERIVACION</p>
                    </div>

                    <p class="text-right"><b>Fecha:</b> {{new Date().getDate()}}-{{new Date().getMonth()+1}}-{{new Date().getFullYear()}}</p>
                    <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label>
                    <label class="m-0 ml-2"><b>Carrera: </b>{{alumno.Carrera}}</label>
                     <label class="m-0 ml-2"><b>Grupo: </b>{{alumno.Grupo}}</label>
                     <label class="m-0 ml-2"><b>Telefono: </b>{{alumno.Telefono}}</label>
                    <p class="m-0"><b>Nombre de quien lo deriva: </b>{{incidencia.ResponsableSeguimiento}}</p>
                    
                    <div class="miGrid2 mt-1">
                        <div>
                            <div>
                                <p class="m-0"><b>Padre</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.NombrePadre}} {{familiar.ApePaternoPadre}}  {{familiar.ApeMaternoPadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                                <br>
                            </div>
                            <div>
                                <p class="m-0"><b>Madre</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.NombreMadre}} {{familiar.ApePaternoMadre}}  {{familiar.ApeMaternoMadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoMadre}}</p>
                                <br>
                            </div>

                            <p><b>Descripción del reporte</b></p> 
                            <textarea v-model="incidencia.DescripcionReporte" name="" id="" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí la descripción del reporte"></textarea>
       
                            <p><b>Comentario de quien le da seguimiento</b></p>
                            <input v-model="incidencia.Comentarios" type="text" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí los comentarios">

                            <label class="m-0"><b>Gravedad de la falta: </b></label>
                            <select v-model="incidencia.TipoFalta">
                                    <option value="Leve">Leve</option>
                                    <option value="Grave">Grave</option>
                                    <option value="Muy Grave">Muy Grave</option>
                            </select>
                        </div>

                        <div>
                            <p><b>Comentario del padre o tutor</b></p> 
                            <textarea v-model="incidencia.ComentariosPa" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí los comentariso del padre"></textarea>

                            <p><b>Observaciones</b></p>
                            <input v-model="incidencia.Observaciones" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí las observaciones">

                            <p><b>Derivación</b></p>
                            <input v-model="incidencia.Derivacion" type="text" class="form-control p-1 mb-1" placeholder="Escriba aquí la derivación">                        
                        </div>
                    </div>
                </div>
            
                <button @click="guardarReporte" class="btnGuardar positionSave">
                    <i class="fas fa-save"> </i> Guardar
                </button>
            </div>

            <div class="modal fade" id="modalEmpty" role="dialog" aria-labelledby="modalEmpty" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger m-0">
                            <h5 class="modal-title m-0 txt-center"> {{alertMessage}} </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import bus from '../../../event-bus';
    export default {
        props: ['userlogeado'],
        data: () => ({
            alumno: {},
            incidencia: {},
            familiar: [],
            tipo: '',
            auth: {},
            alertMessage: String,
        }),
        created() {

            this.$parent.$on('generarMalaConducta', alumno => {              
                this.alumno = alumno;   
                this.incidencia = {};
                this.incidencia.IdAlumno = alumno.IdAlumno; 
                this.auth = JSON.parse(this.userlogeado);
                this.incidencia.ResponsableSeguimiento = this.auth.name;
                this.jalarFamiliar();
                this.tipo = 'Guardar';      
            });
            bus.$on('EditarMalaConducta', (incidencia, alumno) => {      
                console.log('consolelog'); 
                this.alumno = Object.assign({}, alumno);   
                this.incidencia = Object.assign({}, incidencia);
                this.incidencia.Status = undefined;
                this.jalarFamiliar();   
                this.tipo = 'Editar';
            });
        },
        methods: {
            jalarFamiliar() {
                axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar').then(res=>{
                    this.familiar = res.data;
                });
            },
            guardarReporte() {
               if (this.incidencia.DescripcionReporte == undefined 
                    || this.incidencia.Comentarios == undefined
                    || this.incidencia.ComentariosPa == undefined 
                    || this.incidencia.Observaciones == undefined
                    || this.incidencia.Derivacion == undefined) {
                    this.alertMessage = "Llene todos los campos";
                    $('#modalEmpty').modal('show');
                    setTimeout(function(){ $('#modalEmpty').modal('hide') }, 2000);
                }else if (this.incidencia.TipoFalta == undefined) {
                    this.alertMessage = "Seleccione la gravedad de la falta";
                    $('#modalEmpty').modal('show');
                }else if (this.incidencia.Status == undefined) {
                    this.alertMessage = "Seleccione un status para el reporte";
                    $('#modalEmpty').modal('show');
                }else {
                    $('#modalSuccess').modal('show');
                }
                
                this.incidencia.IdFamiliar = this.familiar.IdFamiliar;

                if (this.tipo == 'Guardar') {
                    this.incidencia.TipoReporte = 'Mala Conducta';
                    axios.post('/incidencias', this.incidencia).then(res => {
                        $('#reporteConducta').modal('hide');
                        bus.$emit('incidenciaAgregada', res.data);
                    });
                } else {
                    axios.put('/incidencias/'+this.incidencia.IdIncidencia, this.incidencia).then(res => {
                        $('#reporteConducta').modal('hide');
                        bus.$emit('incidenciaEditada', res.data);
                    });
                }                
            }
        }
    }
</script>

