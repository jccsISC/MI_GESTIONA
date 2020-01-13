<template>
    <div class="modal fade" role="dialog" id="reporteTuto" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Reporte de seguimiento</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body-g">
                    <button class="btn btn-success">concluyó</button>
                    <button class="btn btn-warning">pendiente</button>
                    <p>Fecha: 12-01-2020</p>
                    <div>
                        <p class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                        <p class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</p>
                        <p class="m-0"><b>Nombre de quien lo deriva: </b>PSIC. JOSÉ SALVADOR ALCAZAR MOLINA</p>
                        <p class="m-0"><b>Padre o Tutor: </b>Rubí Silva Palominos</p>
                        <p class="m-0"><b>Telefono: </b>4531260729</p>
                        <p class="m-0"><b>Motivo: </b> Ha faltado 3 días en esta semana</p>
                    </div>

                    <div>
                        <h3>Descripción de la derivación</h3>
                        <div class="descrip">
                            <p class="m-0">Contestó la mamá, acordó hablar con Julio Cesar comenta que dos días faltó por problemas con su pié y que esos dos dias seran justificados</p>
                        </div>
                        
                    </div>

                </div>
                
                <div class="modal-footer">
                    <button class="mibtn" @click="$emit('actualizarBeca', {})">
                        <i class="fas fa-plus-circle"> Guardar</i>
                    </button>
                </div>
                
            </div>
        </div>
    </div>

</template>

<script>
    export default {
         data() {
            return {
                alumno: {}
            }
        },
        created() {
            this.$parent.$on('generarReporte', alumno => {
                
                this.alumno = alumno;
               
            });
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