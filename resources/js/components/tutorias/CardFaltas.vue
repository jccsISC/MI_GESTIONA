<template>
    <div class="contenedorCard">
        <p class="subtitulos">Faltas por asignatura</p>
        <div id="cardFaltas" class="micard" onclick="abrir()">
            <div>
                                 
            </div>
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

</style>