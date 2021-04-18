<template>
    <div>
        <div v-if="alumno.IdAlumno && !alumno.Reporte" class="posicionBtn">
            <button type="button" class="miBtn" data-toggle="modal" data-target="#reporteTuto"
                @click="$emit('generarReporte', alumno)">
                Generar reporte
            </button>
        </div>

        <div v-if="alumno.IdAlumno && alumno.Reporte" class="posicionBtn">
            <button type="button" class="miBtn" data-toggle="modal" data-target="#reporteTuto"
                @click="emit('kevin', alumno.Reporte, alumno, alumno.Reporte.familiar)">
                Editar reporte
            </button>
        </div>

        <generar-reporte :userlogeado="userlogeado"></generar-reporte>  
    </div>     
</template>

<script>
  import bus from '../../event-bus';
    export default {
        props: ['userlogeado'],
        data() {
            return {
                alumno: {},
            
            }
        },
        methods: {
            emit(el, julio, se, lacome) {
                bus.$emit(el, julio, se, lacome);
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                // if(this.alumno.IdAlumno != alumno.IdAlumno){
                    this.alumno = alumno;
                // }
            });
        }
    }
</script>

<style>

    .posicionBtn{
        position: fixed;
        top: 120px;
        right: 1%;
        width: 180px;
    }
    .miBtn{
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

</style>