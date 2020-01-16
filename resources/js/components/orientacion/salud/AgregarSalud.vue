<template >  
  <div class="modal fade" id="addSalud" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registrar la Salud del Alumno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body-s">
            <form @submit.prevent="guardarSalud">
                    
                    <div class="mcontenidoSalud">
                        <div>
                            <label>Esatatura:</label>
                            <input type="number" step="0.0" min="0" class="form-control m-0 w-25 p-0" placeholder="0.0" v-model="salud.Estatura">
                            
                            <label>Anteojos:</label>
                            <input type="radio" name="anteojos" value="si" id="si" @click="salud.Anteojos = 1"><label>Si</label>
                            <input type="radio" name="anteojos" value="no" id="no" @click="salud.Anteojos = 0"><label>No</label><br>
                            
                            <label>Transtornos:</label>
                            <input type="radio" name="transtornos" value="si" id="si" @click="salud.Transtornos = 1"><label>Si</label>
                            <input type="radio" name="transtornos" value="no" id="no" @click="salud.Transtornos = 0"><label>No</label><br>
                            
                        </div>
                        
                        <div>
                            <label>Peso</label>
                            <input type="number" step="0.0" min="0" class="form-control m-0 w-25 p-0" placeholder="0.0" v-model="salud.Peso">
                           
                            <label>Salud Bucal:</label>
                            <input type="radio" name="saludbucal" value="si" id="si" @click="salud.ProbBucal = 1"><label>Si</label>
                            <input type="radio" name="saludbucal" value="no" id="no" @click="salud.ProbBucal = 0"><label>No</label><br>
                            
                            <label>Pie Plano:</label>
                            <input type="radio" name="pieplano" value="si" id="si" @click="salud.PiePlano = 1"><label>Si</label>
                            <input type="radio" name="pieplano" value="no" id="no" @click="salud.PiePlano = 0"><label>No</label><br>
                            
                        </div>

                        <div>
                            <label>Pediculosis:</label>
                            <input type="radio" name="pediculosis" value="si" id="si" @click="salud.Pediculosis = 1"><label>Si</label>
                            <input type="radio" name="pediculosis" value="no" id="no" @click="salud.Pediculosis = 0"><label>No</label><br>
                            
                            <label>Problemas de Lenguaje:</label>
                            <input type="radio" name="problemaL" value="si" id="si" @click="salud.ProbLenguaje = 1"><label>Si</label>
                            <input type="radio" name="problemaL" value="no" id="no" @click="salud.ProbLenguaje = 0"><label>No</label><br>

                            <label>Problemas Auditivos:</label>
                            <input type="radio" name="problemaA" value="si" id="si" @click="salud.ProbAuditivo = 1"><label>Si</label>
                            <input type="radio" name="problemaA" value="no" id="no" @click="salud.ProbAuditivo = 0"><label>No</label><br>
                            
                        </div>

                    </div>
                
                    
		  	    
                    <div class="gridSalud">
                      
                        <div class="pr-3">
                            <label>Alergias:</label>
                            <input type="radio" name="alergias" value="si" id="si" @click="salud.Alergias = 1"><Label>Si</Label>
                            <input type="radio" name="alergias" value="no" id="no" @click="salud.Alergias = 0"><Label>No</Label>
                            <textarea type="text" class="form-control mt-1" placeholder="Ingresa la descripción de la alergia" v-model="salud.DetAlergias"></textarea>
                            
                            <label>Problemas Posturales:</label>
                            <input type="radio" name="problemasPosturales" value="si" id="si" @click="salud.ProbPosturales = 1"><label>Si</label>
                            <input type="radio" name="problemasPosturales" value="no" id="no" @click="salud.ProbPosturales = 0"><label>No</label>
                            <textarea type="text" class="form-control mt-1" placeholder="Detalle el problema postural" v-model="salud.DetProbPosturales"></textarea>
                        </div>
                        
                    
                        <div>
                           
                            <label>Gravidez</label>
                            <input type="radio" name="gravidez" value="si" id="si" @click="salud.Gravidez = 1"><Label>Si</Label>
                            <input type="radio" name="gravidez" value="no" id="no" @click="salud.Gravidez = 0"><Label>No</Label>
                            <textarea type="text" class="form-control mt-1" placeholder="Detalle de la gravidez" v-model="salud.DetGravidez"></textarea>
                
                            <label>Otros:</label>
                            <input type="radio" name="otros" value="si" @click="salud.Otros = 1"><label>Si</label>
                            <input type="radio" name="otros" value="no" @click="salud.Otros = 0"><label>No</label>
                            <textarea type="text" class="form-control mt-1" placeholder="Detalle..." v-model="salud.DetOtros"></textarea>

                        </div>
                    </div>  
              
                    <button type="submit" class="btn btn-primary float-right mt-2"><i class="far fa-save"></i> {{salud.IdSalud ? 'Actualizar' : 'Guardar'}}</button>
              
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
                salud: {}
            }
        },
        created() {
            this.$parent.$on('agregarSalud', alumno => {              
                this.alumno = alumno;
                this.salud.IdAlumno = alumno.IdAlumno; 
                console.log('salud', this.salud);
            });
        },
        methods: {
            guardarSalud() {
                axios.post('/salud', this.salud).then(res => {
                    this.$emit('saludAgregada',res.data);
                    $('#addSalud').modal('hide');
                    console.log('saved');
                });
            }
        }
    }
</script>

<style>
    .mcontenidoSalud{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .gridSalud{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .modal-body-s{
        height: 390px;
        overflow-y: auto;
        padding-left: 10px;
        padding-right: 10px;
    }

</style>