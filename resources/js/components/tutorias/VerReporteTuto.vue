<template>
    <div class="modal fade" role="dialog" id="verReporte" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div>
                    <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                        <p class="subtitulos text-center">Reporte de seguimiento</p>
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

                    <button v-if="reporte.Status && role!='admin' && role!='maestro'" type="button" class="mibtnI positionImprimir">
                        <i class="fas fa-print"></i>
                    </button>

                     <button v-if="!reporte.Status && role!='admin' && role!='maestro'" type="button" class="mibtnEdit posicionbtn" data-toggle="modal" data-target="#reporteTuto">
                            <i class="fas fa-edit"></i>
                    </button>

                    <div class="text-center mt-5">
                        <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
                        <p class="m-0" style="padding-right:110px;">PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
                        <p class="m-0" style="text-decoration: underline;">FORMATO YO NO ABANDONO</p>
                        <p class="m-0">SEGUIMIENTO Y DERIVACION</p>
                    </div>

                    <p class="text-right mt-3"><b>Fecha: </b>{{reporte.FechaInicio}}</p>
                    
                    <div class="contenedorRT mt-4">
                        <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label><br>
                        <label class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</label>
                        <label class="m-0 ml-2"><b>Semestre: </b>{{alumno.Grado}}</label>
                        <label class="m-0 ml-2"><b>Grupo: </b>{{alumno.Grupo}}</label>
                        <label class="m-0 ml-2"><b>Telefono: </b>{{alumno.Telefono}}</label>
                        
                        <p><b>Nombre de quien deriva: </b>{{reporte.Nombrequienderiva}}</p>
                        <p><b>ResponsableSeguimiento: </b>{{reporte.ResponsableSeguimiento}}</p>
                        <p><b>Fammiliar: </b>{{familiar.NombrePadre + ' '+familiar.ApePaternoPadre+ ' '+ familiar.ApeMaternoPadre}}</p>
                        
                        <p><b>Telefono: </b>{{familiar.TelefonoPadre}}</p>
                    </div>
                    
                    <div class="contenedorRT mt-4">
                        <p class="minicontenedor"><b>Motivo: </b>{{reporte.Motivo}}</p>  
                        <p class="minicontenedor"><b>Derivacion: </b>{{reporte.Derivacion}}</p>
                        <p class="minicontenedor"><b>Descripcion del reporte: </b>{{reporte.DescripcionDer}}</p>
                        <p class="minicontenedor"><b>Seguimiento: </b>{{reporte.Seguimiento}}</p>
                        <p class="minicontenedor"><b>Observaciones:</b>{{reporte.Observaciones}}</p>
                    </div>
                    
                    <div class="contenedorRT mt-4 txtP">
                        <p class="m-0">ACADEMICO</p>
                        <p class="m-0">PISC. JOSE SALVADOR ALCAZAR MOLINA</p>
                        <p class="m-0">TUTOR</p>
                        <p class="m-0">ASESORIAS ACADEMICAS</p>
                        <p class="m-0">TUTORIAS GRUPALES/INDIVIDUALES</p>
                        <p class="m-0">REPROBACION Y DESERCION ESCOLAR</p>
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
        
        <generar-reporte></generar-reporte>
    </div>
</template>

<script>
    import bus from '../../event-bus';
    export default {
        props:['role'],
         data() {
            return {
                alumno: {},
                reporte: {},
                familiar: {}
            }
        },
        created() {
             this.$parent.$on('verReporte', (reporte, alumno) => {
                this.reporte = reporte;
                this.alumno = alumno;
                this.familiar = reporte.familiar;

            });
        }
    }
</script>

<style>

    .imgLogo{
        width: 120px;
        height: 40px;
        background: #a5a5a5;
    }
    .contenedorRT {
        border: 1px solid #a5a5a5;
        border-radius: 3px;
        padding: 5px;
    }

    .minicontenedor {
        border: 1px solid #a5a5a5;
        border-radius: 3px;
        padding: 5px;
        margin: 3px;
    }

    .txtP {
        text-align: center;
        line-height: 15px;
        font-size: 11px;
    }

    .gridFirmar {
        margin-top: 70px;
        font-size: 10px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .miHr {
        width: 125px;
        margin: 0;
        margin-right: 25%;
        margin-left: 25%;
        padding: 0;
        background: #4b4b4b;
    }

    .miI {
        margin-right: 24%;
        margin-left: 24%;
    }

    .miM {
        margin-right: 20%;
        margin-left: 20%;
    }

    .miD {
        margin-right: 25%;
        margin-left: 25%;
    }

    .positionImprimir{
        position: fixed;
        top: 140px;
        right: 1%;
    }
</style>