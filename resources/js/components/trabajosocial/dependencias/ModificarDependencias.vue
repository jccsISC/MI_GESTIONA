<template >  
  <div class="modal fade" id="modifyDepencencia" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Dependencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      	  <form @submit.prevent="saveBeca">
                <div class="form-group">
			        <label>Nombre</label>
			        <input type="text" class="form-control" placeholder="Ingresa el nombre de la dependencia">
		  	    </div>
		  	    
                <div class="form-group">
			        <label>Dirección</label>
			        <input type="text" class="form-control" placeholder="Ingresa la dirección de la dependencia">
		  	    </div>

                <div class="form-group">
			        <label>Giro</label>
			        <input type="text" class="form-control" placeholder="Ingresa el giro de la dependencia">
		  	    </div>
                
                <div class="form-group">
			        <label>Telefono</label>
			        <input type="text" class="form-control" placeholder="Ingresa el telefono de la dependencia">
		  	    </div>

                <div class="form-group">
			        <label>Responsable</label>
			        <input type="text" class="form-control" placeholder="Ingresa el responsable de la dependencia">
		  	    </div>

                <div class="form-group">
			        <label>Tipo de Vinculación</label>
			        <input type="text" class="form-control" placeholder="Ingresa el tipo de vinculación de la dependencia">
		  	    </div>
          
		  	    <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> Actualizar</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
   /* created: function() {
      this.$parent.$on('actualizarBeca', beca => {
          this.beca = Object.assign({}, beca);
      });
    },    
    data: function () {
      return {
        beca: {}
      }
    },
    methods: {
      saveBeca: function() {
        axios.put('becas/' + this.beca.IdBeca, this.beca)
          .then(response => {
            this.onSuccess();
          })
          .catch(error => {
            console.log('kevin', error.code);
          });
      },
      eliminarBeca: function() {
        this.beca.Nombre = '';
        this.beca.Tipo = '';
        axios.delete('becas/' + this.beca.IdBeca)
          .then(response => {
           this.onSuccess();
          })
          .catch(error => {
            console.log(error);
          });
      },
      onSuccess: function() {
        this.$emit('becaActualizada', this.beca);
        $('#addBeca').modal('hide');
      }
    }*/
  }
</script>

<style>
    
</style>