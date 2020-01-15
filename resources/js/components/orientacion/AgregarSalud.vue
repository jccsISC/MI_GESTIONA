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

        <div class="modal-body-g">
            <form @submit.prevent="onSubmit">
                <div class="mcontenido">
                    <div class="form-group">
                        <label>Esatatura:</label>
                        <input type="text" class="form-control w-25" placeholder="Ingresa la estatura" v-model="dependencia.Nombre">
                    </div>
                
                    <div class="form-group">
			            <label>Peso</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el peso" v-model="dependencia.Direccion">
		  	        </div>
		  	    
                    <div class="form-group">
	    		        <label>Anteojos:</label>
		    	        <input type="text" class="form-control" placeholder="Ingresa el telefono de la dependencia" v-model="dependencia.Telefono">
		  	        </div>
                    
                    <div class="form-group">
                        <label>Alergias:</label>
                        <input type="text" class="form-control w-25" placeholder="Ingresa la estatura" v-model="dependencia.Nombre">
                    </div>
                
                    <div class="form-group">
			            <label>Gravidez</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el peso" v-model="dependencia.Direccion">
		  	        </div>
		  	    
                    <div class="form-group">
	    		        <label>Problemas Posturales:</label>
		    	        <input type="text" class="form-control" placeholder="Ingresa el telefono de la dependencia" v-model="dependencia.Telefono">
		  	        </div>

                    <div class="form-group">
	    		        <label>Transtornos:</label>
		    	        <input type="text" class="form-control" placeholder="Ingresa el telefono de la dependencia" v-model="dependencia.Telefono">
		  	        </div>
              </div>


              <div class="mcontenido pl-3">
                    <div class="form-group">
                        <label>Pie Plano:</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el responsable de la dependencia" v-model="dependencia.Responsable">
		  	        </div>
                    
                    <div class="form-group">
                        <label>Salud Bucal:</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el tipo de vinculación de la dependencia">
		  	        </div>
                    
                    <div class="form-group">
                        <label>Pediculosis:</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el responsable de la dependencia">
		  	        </div>
                    
                    <div class="form-group">
                        <label>Problemas de Lenguaje:</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el tipo de vinculación de la dependencia" >
		  	        </div>
                    
                    <div class="form-group">
                        <label>Problemas Auditivos:</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el tipo de vinculación de la dependencia">
		  	        </div>

                    <div class="form-group">
                        <label>Otros:</label>
			            <input type="text" class="form-control w-25" placeholder="Ingresa el tipo de vinculación de la dependencia">
		  	        </div>
              </div>

              <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> {{dependencia.IdDependencia ? 'Actualizar' : 'Guardar'}}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    created: function() {
      this.$parent.$on('actualizarDependencia', dependencia => {
        this.dependencia = JSON.parse(JSON.stringify(dependencia));
        this.dependencia.esNuevo = false;
      });
    },  
    data() {
      return {
        dependencia: {}
      }
    },
    methods: {
      onSubmit() {
        if (this.dependencia.IdDependencia) {
          this.actualizarDependencia();
        } else {
          this.saveDependencia();
        }
      },
       onSuccess(res) {
        this.$emit('dependenciaActualizada', res.data);
        $('#addDepencencia').modal('hide');
      },
      actualizarDependencia() {
        if (this.dependencia.Nombre.trim() === '' || this.dependencia.Direccion.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }

        axios.put('/dependencias/' + this.dependencia.IdDependencia, this.dependencia)
          .then(res => {
            this.onSuccess(res);
          });
      },
      saveDependencia() {
        if (this.dependencia.Nombre.trim() === '' || this.dependencia.Direccion.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }
        
        axios.post('/dependencias', this.dependencia)
          .then(res => {
            res.data.esNuevo = true;
            console.log(res.data);
            this.onSuccess(res);
          });
      }
    }
  }
</script>

<style>
    
</style>