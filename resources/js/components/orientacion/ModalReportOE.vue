<template>
    <div>
        <div v-if="alumno.IdAlumno">
            <!-- <select class="miBtn" id="change">
                Generar Reporte
                <option  value="malaConducta">Mala conducta</option>
                <option  value="incidencias">Incidencia</option>
            </select> -->

    

            <button @click="$emit('generarIncidencia', alumno)" type="button" class="miBtn posicionbtn" data-toggle="modal" data-target="#reporteOrientacion">
                Incidencia
            </button>

            <button @click="$emit('generarMalaConducta', alumno)" type="button" class="miBtn posicionbt" data-toggle="modal" data-target="#reporteConducta">
                Mala Conducta
            </button>

        </div>

        <genera-mala-conducta ></genera-mala-conducta>
        <genera-incidencia></genera-incidencia>  
    </div>     
</template>

<script>
  import bus from '../../event-bus';
    export default {
        data() {
            return {
                alumno: {},
            
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                if(this.alumno.IdAlumno != alumno.IdAlumno){
                    this.alumno = alumno;
                }
            });
        }

    }
</script>

<style>

    .posicionbt{
        position: fixed;
        top: 110px;
        right: 5%;
    }
    
    .miBtn{
        background: #800000;
        border-radius: 4px;
        color: white;
        outline: none;
        border: 1px solid #880000;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .miBtn:hover{
        background-color: white;
        color: #800000;
        border: 1px solid #800000;
    }


    .posicionbtn{
        position: fixed;
        top: 140px;
        right: 5%;
    }

</style>