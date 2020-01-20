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
                            <input type="radio" name="anteojos" value="1" v-model="salud.Anteojos"><label>Si</label>
                            <input type="radio" name="anteojos" value="0" v-model="salud.Anteojos"><label>No</label><br>
                            
                            <label>Transtornos:</label>
                            <input type="radio" name="transtornos" value="1" v-model="salud.Transtornos"><label>Si</label>
                            <input type="radio" name="transtornos" value="0" v-model="salud.Transtornos"><label>No</label><br>
                            
                        </div>
                        
                        <div>
                            <label>Peso</label>
                            <input type="number" step="0.0" min="0" class="form-control m-0 w-25 p-0" placeholder="0.0" v-model="salud.Peso">
                           
                            <label>Salud Bucal:</label>
                            <input type="radio" name="saludbucal" value="1" v-model="salud.ProbBucal"><label>Si</label>
                            <input type="radio" name="saludbucal" value="0" v-model="salud.ProbBucal"><label>No</label><br>
                            
                            <label>Pie Plano:</label>
                            <input type="radio" name="pieplano" value="1" v-model="salud.PiePlano"><label>Si</label>
                            <input type="radio" name="pieplano" value="0" v-model="salud.PiePlano"><label>No</label><br>
                            
                        </div>

                        <div>
                            <label>Pediculosis:</label>
                            <input type="radio" name="pediculosis" value="1" v-model="salud.Pediculosis"><label>Si</label>
                            <input type="radio" name="pediculosis" value="0" v-model="salud.Pediculosis"><label>No</label><br>
                            
                            <label>Problemas de Lenguaje:</label>
                            <input type="radio" name="problemaL" value="1" v-model="salud.ProbLenguaje"><label>Si</label>
                            <input type="radio" name="problemaL" value="0" v-model="salud.ProbLenguaje"><label>No</label><br>

                            <label>Problemas Auditivos:</label>
                            <input type="radio" name="problemaA" value="1" v-model="salud.ProbAuditivo"><label>Si</label>
                            <input type="radio" name="problemaA" value="0" v-model="salud.ProbAuditivo"><label>No</label><br>
                            
                        </div>

                    </div>
                
                    
		  	    
                    <div class="gridSalud">
                      
                        <div class="pr-3">
                            <label>Alergias:</label>
                            <input type="radio" name="alergias" value="1" v-model="salud.Alergias"><Label>Si</Label>
                            <input type="radio" name="alergias" value="0" v-model="salud.Alergias"><Label>No</Label>
                            <textarea type="text" class="form-control mt-1" placeholder="Ingresa la descripción de la alergia" v-model="salud.DetAlergias"></textarea>
                            
                            <label>Problemas Posturales:</label>
                            <input type="radio" name="problemasPosturales" value="1" v-model="salud.ProbPosturales"><label>Si</label>
                            <input type="radio" name="problemasPosturales" value="0" v-model="salud.ProbPosturales"><label>No</label>
                            <textarea type="text" class="form-control mt-1" placeholder="Detalle el problema postural" v-model="salud.DetProbPosturales"></textarea>
                        </div>
                        
                    
                        <div>
                           
                            <label>Gravidez</label>
                            <input type="radio" name="gravidez" value="1" v-model="salud.Gravidez"><Label>Si</Label>
                            <input type="radio" name="gravidez" value="0" v-model="salud.Gravidez"><Label>No</Label>
                            <textarea type="text" class="form-control mt-1" placeholder="Detalle de la gravidez" v-model="salud.DetGravidez"></textarea>
                
                            <label>Otros:</label>
                            <input type="radio" name="otros" value="1" v-model="salud.Otros"><label>Si</label>
                            <input type="radio" name="otros" value="0" v-model="salud.Otros"><label>No</label>
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