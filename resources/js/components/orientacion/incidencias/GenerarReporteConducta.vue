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
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img src="images/logo.jpg" style="max-width: 200px;">
                        </div>
                        <div class="col-md-10 text-center">
                            <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
                            <p class="m-0" >PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
                            <p class="m-0" style="text-decoration: underline;">FORMATO YO NO ABANDONO</p>
                            <p class="m-0" >SEGUIMIENTO Y DERIVACION</p>
                        </div>
                    </div>
                    <p class="text-right"><b>Fecha:</b> {{ tipo == 'Guardar' ? toDay : getfechaInicial }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 p-0 mb-2">
                                <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label>
                                <label class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</label><br>
                                <label class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</label>
                                <label class="m-0 float-right"><b>Telefono: </b>{{alumno.Telefono}}</label>
                                <p class="m-0" style="clear:both"><b>Nombre de quien lo deriva: </b>{{incidencia.ResponsableSeguimiento}}</p>
                            </div>
                            <div class="col-md-12 p-0">
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
                                <span v-if="!incidencia.DescripcionReporte" class="text-danger" >Requerido*</span>
                                <textarea v-model="incidencia.DescripcionReporte" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí la descripción del reporte"></textarea>
        
                                <p><b>Comentario de quien le da seguimiento</b></p>
                                <span v-if="!incidencia.Comentarios" class="text-danger" >Requerido*</span>
                                <input v-model="incidencia.Comentarios" type="text" class="form-control p-1 mb-1" placeholder="Escriba aquí los comentarios">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <p><b>Comentario del padre o tutor</b></p> 
                            <span v-if="!incidencia.ComentariosPa" class="text-danger" >Requerido*</span>
                            <textarea v-model="incidencia.ComentariosPa" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí los comentariso del padre"></textarea>

                            <p><b>Observaciones</b></p>
                             <span v-if="!incidencia.Observaciones" class="text-danger" >Requerido*</span>
                            <input v-model="incidencia.Observaciones" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí las observaciones">

                            <p><b>Derivación</b></p>
                             <span v-if="!incidencia.Derivacion" class="text-danger m-0" >Requerido*</span>
                            <input v-model="incidencia.Derivacion" type="text" class="form-control p-1 mb-1" placeholder="Escriba aquí la derivación">   
                            
                            <label class="m-0"><b>Seleccione un estado del reporte </b></label>
                            <form class="was-validated">
                                <div class="form-group">
                                <select class="custom-select" required  v-model="incidencia.Status">
                                    <option :value= 0>Pendiente</option>
                                    <option :value= 1>Concluido</option>
                                </select> 
                                <div class="invalid-feedback">Seleccion el estatus</div>
                                </div>
                            </form>
                            <label class="m-0"><b>Gravedad de la falta</b></label>
                            <form class="was-validated">
                                <div class="form-group">
                                <select class="custom-select" required v-model="incidencia.TipoFalta">
                                    <option value="Leve">Leve</option>
                                    <option value="Grave">Grave</option>
                                    <option value="Muy Grave">Muy Grave</option>
                                </select> 
                                <div class="invalid-feedback">Seleccione la gravedad de la falta</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
                <button @click="guardarReporte" class="btnGuardar positionSave">
                    <i class="fas fa-save"> </i> Guardar
                </button>
            </div>

            <alert-modal :message="alertMessage" :type="alertType" :show="showError" nameAlert="malaConductaModal"></alert-modal>
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
            showError: false,
            alertType: 'danger',
            toDay: String,
        }),
        computed: {
             getfechaInicial() {

                if ( this.incidencia.FechaInicio != null ) {

                    const date = new Date(this.incidencia.FechaInicio);
                    console.log("Fecha inicial: ", date);
                    return (date.getDate() +1) + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                }
            },
        },
        created() {

            this.toDay = new Date().getDate() +"-" + new Date().getMonth()+1 +"-" + new Date().getFullYear();
            console.log("Today: ", this.toDay);

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
            async jalarFamiliar() {

                const {data} = await axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar');
                this.familiar = data;

                // axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar').then(res=>{
                //     this.familiar = res.data;
                // });
            },
            guardarReporte() {

                this.alertType = 'danger';

               if (this.incidencia.DescripcionReporte == undefined || this.incidencia.Comentarios  == undefined 
                    || this.incidencia.ComentariosPa  == undefined || this.incidencia.Observaciones  == undefined 
                    || this.incidencia.Derivacion  == undefined ) {

                    this.alertMessage = "Llene todos los campos";
                    this.showError = true;
                    setTimeout(() => { this.showError = false; }, 2000);

                }else if (this.incidencia.TipoFalta  == undefined ) {

                    this.alertMessage = "Seleccione la gravedad de la falta";
                    this.showError = true;
                    setTimeout(() => { this.showError = false; }, 2000);

                }else if (this.incidencia.Status  == undefined ) {

                    this.alertMessage = "Seleccione un status para el reporte";
                    this.showError = true;
                    setTimeout(() => {this.showError = false; }, 2000);

                }else {

                    this.incidencia.IdFamiliar = this.familiar.IdFamiliar;

                    if (this.tipo == 'Guardar') {

                        this.incidencia.TipoReporte = 'Mala Conducta';

                        axios.post('/incidencias', this.incidencia).then(res => {

                            this.alertMessage = "Se guardó correctamente";
                            this.alertType = 'success';
                            this.showError = true;
                            setTimeout(() => { this.showError = false; }, 1000);
                            setTimeout(function() {  $('#reporteConducta').modal('hide'); }, 2000);
                        
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
    }
</script>

