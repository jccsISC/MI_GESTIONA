<template>
    <div class="contenedorCard">
        <p class="subtitulos">{{tipo === 'ss' ? 'Servicio Social' : 'Practicas Profesionales'}}</p>
        <div class="micardsm colorText" data-toggle="modal" data-target="#addPracticas">
            <div v-if="alumno.IdAlumno" class="contenedorPracticasServicio">
                <div>
                    <div v-if="alumno.IdAlumno" class="float-right m-0 mr-2">
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
                    <p class="mt-3"><b>Dependencia: </b> {{practica.dependencia ? practica.dependencia.Nombre : ''}} </p>
                    <p class="mt-2"><b>Fecha Inicio: </b> {{practica.FechaInicio}}</p>
                    <p class="mt-2"><b>Fecha Fin: </b> {{practica.FechaFin}} </p>
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