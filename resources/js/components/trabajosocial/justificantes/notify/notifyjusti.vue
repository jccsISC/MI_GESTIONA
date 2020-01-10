<template>
    <div class="contenedorCard">
        <p class="subtitulos-small">16-09-2019 a 20-09-2019</p>
        <p class="subtitulos-small">Semana 3</p>
        <p class="subtitulos">Notificación de justificantes</p>
        <div class="micardNotifications">        
            <spinner v-show="loading"></spinner>
            <div id="bgNotify" class="micardNotificaciones" v-for="(alumno, keyjustificante) in alumnos" :key="keyjustificante" @click="seleccionarAlumno(alumno)">
                <div class="minicontent">
                    <p><b>{{ alumno.Nombre }}</b></p>
                    <p><b>{{ alumno.Grado }}</b></p>
                    <p><b>{{ alumno.Grupo }}</b></p>
                </div>

                <div class="float-left ">
                    <label for=""><b>Justificantes {{alumno.justificantes.length}}</b></label>
                    <p v-for="(justificante, keyjustificante2) in alumno.justificantes" :key="keyjustificante2">{{justificante.Fecha}}</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import bus from '../../../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true
            }
        },
        created() {
            axios.get('/trabajosocial?tipo=justificantes').then(res => {
                this.alumnos = res.data;
                this.loading = false;
            });
        },
        methods: {

            seleccionarAlumno(alumno) {
                console.log('click');
                bus.$emit('alumnoSeleccionado', alumno);               
            }
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