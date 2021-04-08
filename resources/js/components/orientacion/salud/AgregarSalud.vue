<template >  
  <div class="modal fade" id="addSalud" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                <p class="subtitulos text-center">Regitrar salud del alumno</p>
            </div>
                
            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <hr class="mt-1">

        <div class="modal-body-s colorText">
            <form @submit.prevent="guardarSalud">
                <div class="mcontenidoSalud">
                    <div>
                        <label>Esatatura </label>
                        <input type="number" step="0.0" min="0" class="widthInput" placeholder="0.0" v-model="salud.Estatura">

                        <label class="ml-3">Peso </label>
                        <input type="number" step="0.0" min="0" class="widthInput" placeholder="0.0" v-model="salud.Peso">

                        <label class="ml-1">Anteojos </label>
                        <label class="radioContent">Si
                            <input type="radio" name="anteojos" value="1" v-model="salud.Anteojos">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="anteojos" value="0" v-model="salud.Anteojos">
                            <span class="circle"></span>
                        </label> 
                        <br>
                        <label class="ml-1">Trastornos: </label>
                        <textarea type="text" class="form-control ml-2 p-0 pl-1" style="width:95%;" placeholder="Transtornos..." v-model="salud.Transtornos"></textarea>
                    </div>
                    
                    <div>
                        <label class="ml-1">Salud bucal </label>
                        <label class="radioContent">Si
                            <input type="radio" name="saludbucal" value="1" v-model="salud.ProbBucal">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="saludbucal" value="0" v-model="salud.ProbBucal">
                            <span class="circle"></span>
                        </label> 
                        <br>

                        <label class="ml-2 mr-3">Pie plano </label>
                        <label class="radioContent">Si
                            <input type="radio" name="pieplano" value="1" v-model="salud.PiePlano">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="pieplano" value="0" v-model="salud.PiePlano">
                            <span class="circle"></span>
                        </label> 
                        <br>

                        <label class="ml-2 mr-1">Pediculosis </label>
                        <label class="radioContent">Si
                            <input type="radio" name="pediculosis" value="1" v-model="salud.Pediculosis">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="pediculosis" value="0" v-model="salud.Pediculosis">
                            <span class="circle"></span>
                        </label> 
                    </div>

                    <div>
                        <label>Problemas de lenguaje </label>
                        <label class="radioContent">Si
                            <input type="radio" name="problemaL" value="1" v-model="salud.ProbLenguaje">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="problemaL" value="0" v-model="salud.ProbLenguaje">
                            <span class="circle"></span>
                        </label> 
                        <br>
                        <label class="ml-1 mr-3">Problemas auditivos </label>
                        <label class="radioContent">Si
                            <input type="radio" name="problemaA" value="1" v-model="salud.ProbAuditivo">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="problemaA" value="0" v-model="salud.ProbAuditivo">
                            <span class="circle"></span>
                        </label> 
                    </div>
                </div>
            
                <div class="gridSalud">
                    <div class="pr-3">
                        <hr class="mt-3">

                        <label>Alergias </label>
                        <label class="radioContent">Si
                            <input type="radio" name="alergias" value="1" v-model="salud.Alergias">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="alergias" value="0" v-model="salud.Alergias">
                            <span class="circle"></span>
                        </label> 
                        <textarea type="text" class="form-control mt-1" placeholder="Ingresa la descripción de la alergia" v-model="salud.DetAlergias"></textarea>
                        
                        <label>Problemas posturales </label>
                        <label class="radioContent">Si
                            <input type="radio" name="problemasPosturales" value="1" v-model="salud.ProbPosturales">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="problemasPosturales" value="0"  v-model="salud.ProbPosturales">
                            <span class="circle"></span>
                        </label> 
                        <textarea type="text" class="form-control mt-1" placeholder="Detalle el problema postural" v-model="salud.DetProbPosturales"></textarea>
                    </div>

                    <div>
                        <hr class="mt-3">
                        <label>Gravidez </label>
                        <label class="radioContent">Si
                            <input type="radio" name="gravidez" value="1" v-model="salud.Gravidez">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="gravidez" value="0" v-model="salud.Gravidez">
                            <span class="circle"></span>
                        </label> 
                        <textarea type="text" class="form-control mt-1" placeholder="Detalle de la gravidez" v-model="salud.DetGravidez"></textarea>

                        <label class="mr-3">Otros </label>
                        <label class="radioContent">Si
                            <input type="radio" name="otros" value="1" v-model="salud.Otros">
                            <span class="circle"></span>
                        </label>
                        <label class="radioContent">No
                            <input type="radio" name="otros" value="0" v-model="salud.Otros">
                            <span class="circle"></span>
                        </label> 
                        <textarea type="text" class="form-control mt-1" placeholder="Detalle..." v-model="salud.DetOtros"></textarea>
                    </div>
                </div>  
        
                <button type="submit" class="btn miBtn positionSave mt-2 mb-2 p-0 pl-2 pr-2"><i class="far fa-save"></i> {{salud.IdSalud ? 'Actualizar' : 'Guardar'}}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>

  export default {
         data() {
            return {
                alumno: {},
                salud: {},
                tipo: ''
            }
        },
        created() {
            this.$parent.$on('agregarSalud', alumno => {              
                this.alumno = alumno;
                this.salud = {};
                this.salud.IdAlumno = alumno.IdAlumno;
                this.tipo = 'agregar';
            });

            this.$parent.$on('editarSalud', salud => {
                this.salud = Object.assign({}, salud);
                this.tipo = 'editar';
            });
        },
        methods: {
            guardarSalud() {
                if (this.tipo == 'agregar') {
                    axios.post('/salud', this.salud).then(res => {
                        this.$emit('saludAgregada', res.data);
                        $('#addSalud').modal('hide');
                        console.log('saved');
                    });
                } else {
                    console.log(this.salud);
                    axios.put('/salud/'+ this.salud.IdSalud, this.salud).then(res => {
                        this.$emit('saludAgregada', res.data);
                        $('#addSalud').modal('hide');
                        console.log('saved');
                    });
                }
                
            }
        }
    }
</script>

<style>
    .mcontenidoSalud{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        font-size: 16px;
    }

    .gridSalud{
        display: grid;
        grid-template-columns: 1fr 1fr;
        font-size: 16px;
    }

    .modal-body-s{
        height: 390px;
        overflow-y: auto;
        padding-left: 10px;
        padding-right: 10px;
    }

    .modal-body-s::-webkit-scrollbar{
        width: 0px;
    }


    .widthInput {
        width: 50px;
    }

    .radioContent {
        display: inline-block;
        position: relative;
        cursor: pointer;
        font-size: 16px;
        user-select: none;
        padding-left: 15px;
    }

    .radioContent input {
        display: none;
    }

    .radioContent .circle {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: #eeeeee;
        position: absolute;
        left: 0;
        top: 5px;
        border-radius: 50%;
    }

    .radioContent:hover .circle {
        background: #cccccc;
    }

    .radioContent input:checked + .circle {
        background-color: #800000;
        border-radius: 50%;
        border: 1px solid #cccccc;
    }


    .positionSave{
        position: fixed;
        bottom: 5px;
        right: 1%;
    }
    
</style>