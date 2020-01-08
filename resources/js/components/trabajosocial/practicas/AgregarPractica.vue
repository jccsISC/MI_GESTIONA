<template >  
  <div class="modal fade" id="addPracticas" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Practicas Profesionales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      	  <form @submit.prevent="savePractica">
	          <div class="form-group">
			        <label>Nombre</label>
			        <input type="text" class="form-control" placeholder="Ingresa el nombre de la beca" v-model="beca.Nombre">
		  	    </div>
		  	    <div class="form-group">
			        <label>Tipo de beca</label>
			        <input type="text" class="form-control" placeholder="Ingresa el tipo de la beca" v-model="beca.Tipo">
		  	    </div>

		  	    <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" @click="eliminarPracticas" class="btn btn-danger">Eliminar</button>

	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
   
  }
</script>

<style>
    
</style>