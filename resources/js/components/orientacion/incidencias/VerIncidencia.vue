<template>
    <div>
        <div class="modal fade" role="dialog" id="verIncidencias" style="z-index: 100000" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div>
                        <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                            <p class="subtitulos text-center">Reporte de incidencia</p>
                        </div>
                        
                        <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                            <span style="color: #800000">&times;</span>
                        </button>
                    </div>

                    <hr class="mt-1">
                    <div class="modal-body-g p-3 colorText">
                        <div class="imgLogo">
                            <img src="images/logo.jpg" alt="">
                        </div>

                        <button  @click="metodo" type="button" class="mibtnEdit posicionbtn" data-toggle="modal" data-target="#reporteOrientacion">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button  type="button" class="mibtnI positionImprimir">
                            <i class="fas fa-print"></i>
                        </button>

                        <div class="text-center mt-5">
                            <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
                            <p class="m-0" style="padding-right:110px;">PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
                            <p class="m-0" style="text-decoration: underline;">FORMATO YO NO ABANDONO</p>
                            <p class="m-0">SEGUIMIENTO Y DERIVACION</p>
                        </div>

                        <p class="text-right mt-3"><b>Fecha: </b>{{incidencia.FechaInicio}}</p>

                        <div class="contenedorRT mt-4">
                            <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label><br>
                            <label class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</label>
                            <label class="m-0 ml-2"><b>Semestre: </b>{{alumno.Grado}}</label>
                            <label class="m-0 ml-2"><b>Grupo: </b>{{alumno.Grupo}}</label>
                            <label class="m-0 ml-2"><b>Telefono: </b>{{alumno.Telefono}}</label>
                            
                           <div>
                                <p class="m-0"><b>Padre</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.NombrePadre}} {{familiar.ApePaternoPadre}}  {{familiar.ApeMaternoPadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                            </div>
                            <div>
                                <p class="m-0"><b>Madre</b></p>
                                <p class="m-0"><b>Nombre: </b>{{familiar.NombreMadre}} {{familiar.ApePaternoMadre}}  {{familiar.ApeMaternoMadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                            </div>
                        </div>
                        
                        <div class="contenedorRT mt-4">
                            <p class="minicontenedor"><b>Motivo: </b>{{incidencia.ComentariosPa}}</p>  
                            <p class="minicontenedor"><b>Derivacion: </b>{{incidencia.Derivacion}}</p>
                            <p class="minicontenedor"><b>Descripcion de la derivación: </b>{{incidencia.DescripcionReporte}}</p>
                            <p class="minicontenedor"><b>Observaciones: </b>{{incidencia.Observaciones}}</p>
                            <p class="minicontenedor"><b>Seguimiento: </b>{{incidencia.Comentarios}}</p>
                        </div>
                        
                        <div class="contenedorRT mt-4 txtP">
                            <p class="m-0">PSICOSOCIAL</p>
                            <p class="m-0">PISC. CESAR RODRIGUEZ GARCIA</p>
                            <p class="m-0">ORIENTACION EDUCATIVA</p>
                            <p class="m-0">HABITOS DE ESTUDIO</p>
                            <p class="m-0">TEMAS DE SALUD MENTAL Y FISICA</p>
                            <p class="m-0">TEMAS FAMILIARES</p>
                        </div>

                        <div class="gridFirmar mb-5">
                            <div>
                                <hr class="miHr">
                                <p class="miI">Nombre y Firma quien deriva</p>
                            </div>

                            <div>
                                <hr class="miHr">
                                <p class="miM">Nombre y Firma del encargado Yo No Abandono Seguimiento</p>
                            </div>

                            <div>
                                <hr class="miHr">
                                <p class="miD">Nombre y Firma de quien da</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <genera-incidencia></genera-incidencia>
    </div>
</template>

<script>
    import bus from '../../../event-bus';
    export default {
        //   props: ['role'],
         data() {
            return {
                alumno: {},
                incidencia: {},
                familiar: {}
            }
        },
        created() {
             bus.$on('verIncidencia', (incidencia, alumno) => {
                this.incidencia = Object.assign({}, incidencia);
                this.alumno = Object.assign({}, alumno);
                this.familiar = this.incidencia.familiar;
            });
        },
        methods: {
            metodo () {
                $('#verIncidencias').modal('hide');
                bus.$emit('EditarIncidencia', this.incidencia, this.alumno);
            }
        }
    }
</script>

<style>
    /* .mibtn{
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
    } */

</style>