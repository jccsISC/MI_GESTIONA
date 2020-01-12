<template>
    <div class="contenedorCard">
        <p class="subtitulos-small">16-09-2019 a 20-09-2019</p>
        <p class="subtitulos-small">Semana 3</p>
        <p class="subtitulos">Notificación de Inacistencias</p>
        <div class="micardNotifications"> 

            
           
        </div>
    </div>
</template>

<script>
  

    export default {
        data() {
            return {
                alumnos: []
            }
        },
        created() {
        
        },
        methods: {

        }
    }
</script>
   
<style>
    
    .micardNotificaciones{
        padding-top: 10px;
    }

    .micardNotificaciones p{
        padding: 0;
        margin: 0;
        overflow: hidden;
    }
    .minicontent{
        width: 50%;
        padding-left: 20px;
        float: left;
    }

    .mip{
        width: 100px;
        height: 20px;
        overflow: auto;
    }

</style>