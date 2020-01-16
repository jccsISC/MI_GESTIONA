<template>
    <div class="contenedorCard">
        <p class="subtitulos">Salud</p>
        <div class="micard">
            <div v-if="alumno.IdAlumno">
                <div class="mcontenido  pt-1 interlineado">
                    <p><b>Estatura: </b>{{salud.Estatura}}</p>
                    <p><b>Peso: </b>{{salud.Peso}}</p>
                    <p><b>IMC: </b>{{salud.IMC}}</p>
                    <p><b>Anteojos: </b>{{salud.Anteojos ? 'Si' : 'No'}}</p>
                    <p><b>Alergias: </b>{{salud.Alergias ? 'Si' : 'No'}}</p>
                    <p><b>Graviez: </b>{{salud.Gravidez ? 'Si' : 'No'}}</p>
                    <p><b>Problemas Posturales: </b>{{salud.ProbPosturales ? 'Si' : 'No'}}</p>
                    <p><b>Transtornos: </b>{{salud.Transtornos ? 'Si' : 'No'}}</p>
                </div>

                <div class="mcontenido pt-1 interlineado">
                    <p><b>Pie Plano: </b>{{salud.PiePlano ? 'Si' : 'No'}}</p>
                    <p><b>Salud Bucal: </b>{{salud.ProbBucal ? 'Si' : 'No'}}</p>
                    <p><b>Pediculosis: </b>{{salud.Pediculosis ? 'Si' : 'No'}}</p>
                    <p><b>Problemas Lenguaje: </b>{{salud.ProbLenguaje ? 'Si' : 'No'}}</p>
                    <p><b>Problemas Auditivos: </b>{{salud.ProbAuditivo ? 'Si' : 'No'}}</p>
                    <p><b>Otros: </b>{{salud.Otros ? 'Si' : 'No'}}</p>
                </div>
            </div>
        </div>
        <div v-if="alumno.IdAlumno" class="float-right">
            <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#addSalud"
                @click="$emit('agregarSalud', alumno)">
                <i class="fas fa-plus"></i>
            </button>        
            
            <add-salud @saludAgregada="salud = $event"></add-salud>     
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