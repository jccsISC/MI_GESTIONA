<template>

  <div class="modal fade" id="detalleTaller" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-body-xl">
           <p>Fecha: <input type="date" class="form-control w-50 p-0"></p>
           <p>Hora del Curso: <input type="time" class="form-control w-50 p-0"></p>
            <div class="form-group">
	    		<label>Nombre del Taller:</label>
		    	<input type="text" class="form-control p-0" placeholder="Ingresa el nombre del taller">
		  	</div>
            <div class="form-group">
	    		<label>Institución:</label>
		    	<input type="text" class="form-control p-0" placeholder="Ingresa el nombre del taller">
		  	</div>
            
            <div class="form-group">
	    		<label>Dirigido a:</label>
		    	<select class="form-control">
              <option value="">A</option>
              <option value="">B</option>
              <option value="">C</option>
              <option value="">D</option>
              <option value="">F</option>
              <option value="">G</option>
              <option value="">H</option>
              <option value="">I</option>
              <option value="">J</option>
          </select>
		  	</div>
            
            <div class="form-group">
	    		<label>Número de Beneficiados:</label>
                <input type="number" class="form-control w-50 p-0" placeholder="Cantidad">
		  	</div>

            <div class="form-group">
	    		<label>Nombre del responsable:</label>
                <input type="text" class="form-control p-0" placeholder="Nombre del que imparte el curso">
		  	</div>
            
            <div>
                <button type="button" class="miBtn float-right mb-2">Guardar</button>
            </div>

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
.modal-body-xl::-webkit-scrollbar{
    width: 0px;
}

.modal-body-xl{
    height: 300px;
    overflow-y: auto;
    padding-left: 10px;
    padding-right: 10px;
  }

</style>