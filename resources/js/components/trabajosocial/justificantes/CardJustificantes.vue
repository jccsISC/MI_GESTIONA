<template>
    <div class="contenedorCard">
        <p class="subtitulos">Justificantes y Pases de Salida</p>
        <div class="micardsm" data-toggle="modal" data-target="#addPracticas">
            <div class="contenedorPracticasServicio">
                <div>
                    <label><b>Justificantes</b></label><br>
                    <label v-for="(justificante, keyjustificantepase) in justificantes" :key="keyjustificantepase"><b>Días: </b>{{justificante.FechaInicio}}</label><br>
                </div>
                <div>
                    <label><b>Pases de Salida</b></label><br>
                    <label v-for="(pase, keyjustificantepase2) in pases" :key="keyjustificantepase2"><b>Días: </b>{{pase.Fecha}}</label><br>
                </div>
            </div>
        </div>
        <!--btn agregar dependencia-->
        <modal-justificante></modal-justificante>
    </div>
</template>

<script> 
    
    import bus from '../../../event-bus';
    export default {
        data() {
            return {
                alumno: {},
                justificantes: [],
                pases: []
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarJustificantes();
                this.jalarPases();
            });
        },
        methods: {
            jalarPases() {
                axios.get('/trabajosocial/' + this.alumno.IdAlumno + '/pases').then(res => {
                    this.pases = res.data;
                    console.log(res.data);
                });
            },
            jalarJustificantes() {
                axios.get('/trabajosocial/' + this.alumno.IdAlumno + '/justificantes').then(res => {
                    this.justificantes = res.data;
                    console.log(res.data);
                });
            }
        }
    }
</script>

<style>

</style>