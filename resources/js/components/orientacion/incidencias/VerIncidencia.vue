<template>
    <div>
        <div class="modal fade" role="dialog" id="verIncidencias" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Reporte de Incidencia</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                    <div class="modal-body-g">
                        <p><b>Fecha: </b>{{incidencia.FechaInicio}}</p>
                        <p class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                        <p class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</p>
                        <p class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</p>
                        <p class="m-0"><b>Telefono: </b>{{alumno.Telefono}}</p>
                        <p class="m-0"><b>Nombre de quien lo deriva: </b>{{incidencia.ResponsableSeguimiento}}</p>
                        <p><b>Fammiliar: </b>{{familiar.Nombre + ' '+familiar.ApePaterno+ ' '+ familiar.ApeMaterno}}</p>
                        
                        <p class="m-0"><b>Telefono: </b>{{familiar.Telefono}}</p>
                        <p><b>Motivo: </b>{{incidencia.DescripcionReporte}}</p>  

                        <p><b>Derivacion: </b>{{incidencia.Comentarios}}</p>

                        

                        <p><b>Descripcion de la derivacion</b>{{incidencia.Observaciones}}</p>
                       
                        <p><b>Derivación</b>{{incidencia.Derivacion}}</p>

                        
                         <button @click="metodo" type="button" class="mibtnEdit posicionbtn" data-toggle="modal" data-target="#reporteOrientacion">
                            <i class="fas fa-edit"></i>
                        </button>
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
         data() {
            return {
                alumno: {},
                incidencia: {},
                familiar: {}
            }
        },
        created() {
             this.$parent.$on('verIncidencia', (incidencia, alumno) => {
                this.incidencia = Object.assign({}, incidencia); ;
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