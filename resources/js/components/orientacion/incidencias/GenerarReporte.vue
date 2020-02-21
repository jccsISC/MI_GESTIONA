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
                    <div class="imageLogo">
                        <img src="images/logo.jpg" alt="">
                    </div>

                    <div class="text-center">
                        <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
                        <p class="m-0" style="padding-right:110px;">PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
                        <p class="m-0" style="text-decoration: underline; padding-left:80px;">FORMATO YO NO ABANDONO</p>
                        <p class="m-0" style="padding-left:80px;">SEGUIMIENTO Y DERIVACION</p>
                    </div>

                    <p class="text-right"><b>Fecha:</b> {{new Date().getDate()}}-{{new Date().getMonth()+1}}-{{new Date().getFullYear()}}</p>
                    <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label>
                    <label class="m-0 ml-2"><b>Grupo: </b>{{alumno.Grupo}}</label>
                    <p class="m-0"><b>Nombre de quien lo deriva: </b>{{reporte.ResponsableSeguimiento}}</p>

                    <div class="miGrid2 mt-1">
                        
                        <div>
                           <div>
                                <p class="m-0"><b>Padre</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.NombrePadre}} {{familiar.ApePaternoPadre}}  {{familiar.ApeMaternoPadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                            </div>
                            <div>
                                <p class="m-0"><b>Madre</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.NombreMadre}} {{familiar.ApePaternoMadre}}  {{familiar.ApeMaternoMadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoMadre}}</p>
                            </div>

                            <p><b>Motivo</b></p> 
                            <textarea required v-model="reporte.ComentariosPa" name="" id="" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí los motivos"></textarea>
       
                            <p><b>Derivación</b></p>
                            <input required v-model="reporte.Derivacion" type="text" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí a donde lo deriva">
                        </div>

                        <div>
                            <p><b>Descripción de la derivación</b></p> 
                            <textarea required v-model="reporte.DescripcionReporte" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí la descripción de la derivación"></textarea>

                            <p><b>Observaciones</b></p>
                            <input required v-model="reporte.Observaciones" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí las observaciones">

                            <p><b>Seguimiento</b></p>
                            <input required v-model="reporte.Comentarios" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí el seguimiento que se dará">                        
                        </div>
                    </div>


                     <button  type="submit" class="btnGuardar positionSave">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </form>
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
                auth: {}
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
            jalarFamiliar() {
                axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar').then(res=>{
                this.familiar = res.data;
                });
            },
            guardarReporte() {
                if (this.tipo == 'Guardar') {
                    this.reporte.TipoReporte = 'Incidencia';
                    axios.post('/incidenciareal', this.reporte).then(res => {
                        //window.location.href = '/T';
                        $('#reporteOrientacion').modal('hide');
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