<template>
    <div class="contenedorCard">
        <p class="subtitulos">{{tipo === 'ss' ? 'Servicio Social' : 'Practicas Profesionales'}}</p>
        <div class="micardsm" data-toggle="modal" data-target="#addPracticas">
            <div v-if="alumno.IdAlumno" class="contenedorPracticasServicio">
                <div>
                    <p class="mt-sm-1"><b>Dependencia: </b> {{practica.dependencia ? practica.dependencia.Nombre : ''}} </p>
                    <p><b>Fecha Inicio: </b> {{practica.FechaInicio}}</p>
                    <p><b>Fecha Fin: </b> {{practica.FechaFin}} </p>
                </div>

                <div v-if="alumno.IdAlumno" class="float-right m-0">
                    <button v-if="!practica" type="button" class="btn btn-primary btn-sm" data-toggle="modal" :data-target="'#addPractServenAlumn'+tipo"
                        @click="$emit('agregarPracticaAlumno', alumno)">
                        <i class="fas fa-plus-circle"></i>
                    </button>

                    <button v-if="practica" type="button" class="btn btn-danger btn-sm"
                        @click="eliminarPractica()">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    <add-practservi-alumn :tipo="tipo" @practicaAlumnoAgregada="practica = $event"></add-practservi-alumn>     
                </div>


            </div>
        </div>    

       <crear-dependencia></crear-dependencia>
    </div>
</template>

<script> 

    import bus from '../../../event-bus';
    export default {
        data() {
            return {
                practica: {},
                alumno: {}
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                 if(this.alumno.IdAlumno != alumno.IdAlumno){
                    this.alumno = alumno;
                    this.jalarPractica();
                 }

            });
        },
        methods: {
            jalarPractica() {
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/practica?tipo='+this.tipo).then(res => {
                    this.practica = res.data;
                    console.log(res);
                })
                .catch();
            },
            eliminarPractica(){
                axios.delete(`/practicas/${this.practica.IdServPrac}`)
                .then(res => {
                    console.log(res);
                    this.practica = {};
                });
            }
        },
        props: ['tipo']
       
    }
</script>

<style>

</style>