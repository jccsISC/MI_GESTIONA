<template >  
  <div class="modal fade" id="addJustificantes" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Justificante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
                <div class="form-group">
			          <label>Fecha Inicio</label>
			          <input type="date" class="form-control" placeholder="Ingresa la fecha inicial" v-model="justificante.FechaInicio">
		  	    </div>
		  	  
                <div class="form-group">
			          <label>Fecha Fin</label>
			          <input type="date" class="form-control" placeholder="Ingresa la fecha final" v-model="justificante.FechaFin">
		  	    </div>
		  	  
                <div class="form-group">
			          <label>Motivo</label>
			          <input type="text" class="form-control" placeholder="Ingresa el motivo del justificante" v-model="justificante.Motivo">
		  	    </div>
		  	  
		  	    <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i>Guardar</button>
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
        justificante: {}
      }
    },
    methods: {
    
      saveBeca() {
        if (this.justificante.FechaInici.trim() === '' || this.justificante.FechaFin.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }

        axios.post('/justificantes', this.justificante)
        .then(res => {
            this.$emit('guardarJustificante', res.data);
            $('#addJustificante').modal('hide');

        });
      }
    }
  }
</script>

<style>
    
</style>