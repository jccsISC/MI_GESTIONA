<template>
    <div class="contenedorCard">
        <p class="subtitulos">Salud</p>
        <div class="micard">
            <div v-if="alumno.IdAlumno">
                <div class="mcontenido  pt-1 interlineado">
                    <p><b>Estatura: </b>{{salud.Estatura}}</p>
                    <p><b>Peso: </b>{{salud.Peso}}</p>
                    <p><b>IMC: </b>{{salud.IMC}}</p>
                    <p><b>Anteojos: </b>{{salud.Anteojos == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Alergias: </b>{{salud.Alergias == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Graviez: </b>{{salud.Gravidez == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Problemas Posturales: </b>{{salud.ProbPosturales == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Transtornos: </b>{{salud.Transtornos == 1 ? 'Si' : 'No'}}</p>
                </div>

                <div class="mcontenido pt-1 interlineado">
                    <p><b>Pie Plano: </b>{{salud.PiePlano == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Salud Bucal: </b>{{salud.ProbBucal == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Pediculosis: </b>{{salud.Pediculosis == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Problemas Lenguaje: </b>{{salud.ProbLenguaje == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Problemas Auditivos: </b>{{salud.ProbAuditivo == 1 ? 'Si' : 'No'}}</p>
                    <p><b>Otros: </b>{{salud.Otros == 1 ? 'Si' : 'No'}}</p>
                </div>
            </div>
        </div>
        <div v-if="alumno.IdAlumno" class="float-right">
            <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#addSalud"
                @click="abrirModal()">
                <i v-if="!salud.IdSalud" class="fas fa-plus"></i>
                <i v-if="salud.IdSalud" class="fas fa-edit"></i>
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
                salud: {}
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarSalud();
            });
        },
        methods:{
            jalarSalud() {
                axios.get('/salud/'+this.alumno.IdAlumno).then(res => {
                    this.salud = res.data;
                });
            },
            abrirModal() {
                if (this.salud.IdSalud) {
                    this.$emit('editarSalud', this.salud);
                } else {
                   this.$emit('agregarSalud', this.alumno);
                }
            }
        }
    
    }
</script>

<style>

    .mcontenido {
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