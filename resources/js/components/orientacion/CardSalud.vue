<template>
    <div class="contenedorCard">
        <p class="subtitulos">Salud</p>
        <div class="micard">
            <div>
                <div class="mcontenido  pt-1 interlineado">
                    <p><b>Estatura: </b></p>
                    <p><b>Peso: </b></p>
                    <p><b>IMC: </b></p>
                    <p><b>Anteojos: </b></p>
                    <p><b>Alergias: </b></p>
                    <p><b>Graviez: </b></p>
                    <p><b>Problemas Posturales: </b></p>
                    <p><b>Transtornos: </b></p>
                </div>

                <div class="mcontenido pt-1 interlineado">
                    <p><b>Pie Plano: </b></p>
                    <p><b>Salud Bucal: </b></p>
                    <p><b>Pediculosis: </b></p>
                    <p><b>Problemas Lenguaje: </b></p>
                    <p><b>Problemas Auditivos: </b></p>
                </div>
            </div>
        </div>
        <div class="float-right">
            <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#addSalud"
                @click="$emit('agregarBecaAlumno', alumno)">
                <i class="fas fa-plus"></i>
            </button>        
            
            <add-salud @becaAlumnoAgregada="becas.push($event)"></add-salud>     
        </div>
    </div>
</template>

<script>
   
    import bus from '../../event-bus';
    export default {
        data() {
            return {
                alumno: {}
            }
        },
        created() {
            
        }
    
    }
</script>

<style>

    .mcontenido{
        width: 50%;
        float: left;
        /* overflow: hidden; */
    }

    .interlineado{
        line-height: 30px;
    }

    .textShadow{
        margin: 0;
        color: rgb(165, 0, 0);
        text-shadow: 1px 1px 5px #2c2b2b86;
    }
    
</style>