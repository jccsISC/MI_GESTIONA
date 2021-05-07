<template>
    <div class="contenedorCard">
        <p class="subtitulos">Salud</p>
        <div class="micard colorText">
            <div v-if="alumno.IdAlumno">
                <div v-if="alumno.IdAlumno" class="float-right">
                    
                    <button v-if="!salud.IdSalud" type="button" class="btn btn-sm btn-primary  p-0 pl-1 pr-1" 
                        data-toggle="modal" data-target="#addSalud"
                        @click="abrirModal()">
                        <i  class="fas fa-plus"></i>
                    </button>

                    <button v-if="salud.IdSalud"  type="button" class="btn btn-sm mibtnEdit p-0 pl-1 pr-1"
                        data-toggle="modal" data-target="#addSalud"
                        @click="abrirModal()">
                        <i class="fas fa-edit"></i>
                    </button>      
                    
                    <add-salud @saludAgregada="salud = $event"></add-salud>     
                </div>

                <div class="mcontenido  pt-1 interlineado">
                    <p class="m-0 p-0"><b>Estatura: </b>{{salud.Estatura}}</p>
                    <p class="m-0 p-0"><b>Peso: </b>{{salud.Peso}}</p>
                    <p class="m-0 p-0"><b>IMC: </b>{{salud.IMC}}</p>
                    <p class="m-0 p-0"><b>Anteojos: </b>{{salud.Anteojos == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Alergias: </b>{{salud.Alergias == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Graviez: </b>{{salud.Gravidez == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Problemas posturales: </b>{{salud.ProbPosturales == 1 ? 'Si' : 'No'}}</p>
                    <p class="miMaxLength2"><b>Trastornos: </b>{{salud.Transtornos}}</p>
                </div>

                <div class="mcontenido pt-1 interlineado">
                    <p class="m-0 p-0"><b>Pie plano: </b>{{salud.PiePlano == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Salud bucal: </b>{{salud.ProbBucal == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Pediculosis: </b>{{salud.Pediculosis == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Problemas lenguaje: </b>{{salud.ProbLenguaje == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Problemas auditivos: </b>{{salud.ProbAuditivo == 1 ? 'Si' : 'No'}}</p>
                    <p class="m-0 p-0"><b>Otros: </b>{{salud.Otros == 1 ? 'Si' : 'No'}}</p>
                </div>
            </div>
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