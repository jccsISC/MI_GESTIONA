<template >  
  <div class="modal fade" id="addDepencencia" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{dependencia.IdDependencia ? 'Actualizar' : 'Agregar'}} Dependencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
              <div class="form-group">
			          <label>Nombre</label>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre de la dependencia" v-model="dependencia.Nombre">
		  	      </div>
		  	    
              <div class="form-group">
			          <label>Dirección</label>
			          <input type="text" class="form-control" placeholder="Ingresa la dirección de la dependencia" v-model="dependencia.Direccion">
		  	      </div>

              <div class="form-group">
			          <label>Giro</label>
			          <input type="text" class="form-control" placeholder="Ingresa el giro de la dependencia" v-model="dependencia.Giro">
		  	      </div>
                
              <div class="form-group">
			          <label>Telefono</label>
			          <input type="text" class="form-control" placeholder="Ingresa el telefono de la dependencia" v-model="dependencia.Telefono">
		  	      </div>

              <div class="form-group">
			          <label>Responsable</label>
			          <input type="text" class="form-control" placeholder="Ingresa el responsable de la dependencia" v-model="dependencia.Responsable">
		  	      </div>

              <div class="form-group">
			          <label>Tipo de Vinculación</label>
			          <input type="text" class="form-control" placeholder="Ingresa el tipo de vinculación de la dependencia" v-model="dependencia.TipoVinculacion">
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
            this.onSuccess(res);
          });
      }
    }
  }
</script>

<style>
    
</style>