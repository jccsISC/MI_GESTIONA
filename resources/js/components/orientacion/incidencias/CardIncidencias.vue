<template>
    <div class="contenedorCard">
        <p class="subtitulos">Incidencias</p>
        <div class="micard">
            <div v-if="alumno.IdAlumno">
                <div class="pt-1 interlineado">
                    <p><b>Cantidad de incidencias</b></p>
                    <button class="btn btn-danger btn-sm ml-1 p-0 pr-2 pl-2"
                        data-toggle="modal" data-target="#addJustificantes">
                        1
                    </button>
                    
                    <button class="btn btn-danger btn-sm ml-1 p-0 pr-2 pl-2"
                        data-toggle="modal" data-target="#addJustificantes">
                        2
                    </button>
                </div>

                <div class="mcontenidoL pt-1 interlineado">
                    <p><b>Detalles</b></p>
                    <p><b>Tipo de Falta: </b>Leve</p>
                    <p><b>Seguimiento: </b>Concluido</p>
                    <p><b>Observaciones: </b>Comprará pintura por las bu...</p>
                    <p><b>Problemas Auditivos: </b>Lic. Cesar Rodriguez Garcia</p>
                </div>

                <div class="pt-1">
                    <p class="p-0 m-0 fecha"><b>Fecha</b>16-01-2020</p>
                     <button class="btn btn-transparent btn-sm float-right p-0 mr-2"
                        data-toggle="modal" data-target="#addJustificantes">
                        <img src="images/historial.png" alt="ver el historial" style="width: 20px; height: 20px;">
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   
    import bus from '../../../event-bus';
    export default {
        data() {
            return {
                alumno: {},
                salud:{}
            }
        },
        created() {
            bus.$on('alumnoSeleccionado',alumno => {
                this.alumno = alumno;
                this.jalarSalud();
            });
        },
        methods:{
            jalarSalud(){
                axios.get('/salud/'+this.alumno.IdAlumno).then(res =>{
                    this.salud = res.data;
                });
            }
        }
    
    }
</script>

<style>

    .mcontenidoL{
        width: 75%;
        float: left;
        padding: 0;
        /* overflow: hidden; */
    }

    .fecha{
        font-size: 11px;
    }

</style>