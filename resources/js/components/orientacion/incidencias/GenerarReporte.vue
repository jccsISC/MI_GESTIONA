<template>
    <div class="modal fade" role="dialog" id="reporteOrientacion" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div>
                    <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                        <p class="subtitulos text-center">Reporte de Incidencia</p>
                    </div>
                    
                    <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                        <span style="color: #800000">&times;</span>
                    </button>
                </div>

                <form @submit.prevent="guardarReporte" class="modal-body-g p-3 bordeReport colorText">
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

                    <p class="text-right"><b>Fecha:</b>{{new Date().getDate()}}-{{new Date().getMonth()+1}}-{{new Date().getFullYear()}}</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label><br>
                            <label class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</label>
                            <p class="m-0"><b>Nombre de quien lo deriva: </b>{{reporte.ResponsableSeguimiento}}</p>

                            <div class="mt-2">
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

                            <p><b>Motivo</b></p> 
                            <span v-if="!reporte.ComentariosPa" class="text-danger" >Requerido*</span>
                            <textarea v-model="reporte.ComentariosPa" name="" id="" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí los motivos"></textarea>
                        </div>
                        <div class="col-md-6">
                            <p><b>Descripción de la derivación</b></p> 
                              <span v-if="!reporte.DescripcionReporte" class="text-danger" >Requerido*</span>
                            <textarea  v-model="reporte.DescripcionReporte" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí la descripción de la derivación"></textarea>

                            <p><b>Observaciones</b></p>
                              <span v-if="!reporte.Observaciones" class="text-danger" >Requerido*</span>
                            <input  v-model="reporte.Observaciones" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí las observaciones">

                            <p><b>Seguimiento</b></p>
                              <span v-if="!reporte.Comentarios" class="text-danger" >Requerido*</span>
                            <input  v-model="reporte.Comentarios" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí el seguimiento que se dará">
                            
                            <p><b>Derivación</b></p>
                            <span v-if="!reporte.Derivacion" class="text-danger" >Requerido*</span>
                            <input  v-model="reporte.Derivacion" type="text" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí a donde lo deriva">
                        </div>
                    </div>
                    

                     <button  type="submit" class="btnGuardar positionSave">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </form>
                
                <alert-modal :message="alertMessage" :type="alertType" :show="showError" nameAlert="incidenciaModal"></alert-modal>
            </div>
        </div>
    </div>
</template>

<script>
    import bus from '../../../event-bus';
    export default {
        props: ['userlogeado'],
         data() {
            return {
                alumno: {},
                reporte: {},
                familiar: {},
                tipo: '',
                auth: {},
                alertMessage: String,
                showError: false,
                alertType: 'danger',
            }
        },
        created() {

            bus.$on('EditarIncidencia', (incidencia, alumno) => {
                this.alumno = Object.assign({}, alumno);   
                this.reporte = Object.assign({}, incidencia);
                this.jalarFamiliar();   
                this.tipo = 'Editar';
            });


            this.$parent.$on('generarIncidencia', alumno => {    
                this.reporte = {};
                this.alumno = alumno;   
                this.reporte.IdAlumno = alumno.IdAlumno; 
                this.auth = JSON.parse(this.userlogeado);
                this.reporte.ResponsableSeguimiento = this.auth.name;
                console.log(this.auth);
                this.tipo = 'Guardar';
                this.jalarFamiliar();      
            });
        },
        methods: {
            async jalarFamiliar() {

                const {data} = await axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar');
                this.familiar = data;

                // axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar').then(res=>{
                // this.familiar = res.data;
                // });
            },
            guardarReporte() {

                this.alertType = 'danger';

                 if (this.reporte.ComentariosPa == undefined || this.reporte.Derivacion  == undefined 
                    || this.reporte.DescripcionReporte  == undefined || this.reporte.Observaciones  == undefined 
                    || this.reporte.Comentarios  == undefined ) {

                    this.alertMessage = "Llene todos los campos";
                    this.showError = true;
                    setTimeout(() => { this.showError = false; }, 2000);

                }else {
                    
                    this.reporte.IdFamiliar = this.familiar.IdFamiliar;

                    if (this.tipo == 'Guardar') {

                        this.reporte.TipoReporte = 'Incidencia';

                        axios.post('/incidenciareal', this.reporte).then(res => {
                            
                            this.alertMessage = "Se guardó correctamente";
                            this.alertType = 'success';
                            this.showError = true;

                            setTimeout(() => { this.showError = false; }, 1000);
                            setTimeout(function() {  $('#reporteOrientacion').modal('hide'); }, 2000);
                         
                            bus.$emit('incidenciaAgregada', res.data);
                        });
                } else {

                    axios.put('/incidenciareal/'+this.reporte.IdIncidencia, this.reporte).then(res => {
                        $('#reporteOrientacion').modal('hide');
                        bus.$emit('incidenciaEditada', res.data);
                    });
                }
            }    
            
        }
     }
}
</script>

<style>
    .mibtn{
        background: #800000;
        border-radius: 4px;
        color: white;
        outline: none;
        padding-left:5px;
        padding-right: 5px; 
        border: 1px solid #800000;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .miBtn:hover{
        background-color: rgb(255, 255, 255);
        color: rgb(167, 11, 11);
        border: 1px solid #800000;
    }

    .descrip{
        min-width: 40%;
        min-height: 150px;
        border: 1px solid rgb(31, 30, 30);
        border-radius: 6px;
        padding: 5px;
    }

</style>