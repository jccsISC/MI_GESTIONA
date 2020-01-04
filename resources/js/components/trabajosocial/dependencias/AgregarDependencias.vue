<template >  
  <div class="modal fade" id="addDepencencia" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Dependencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="agregar">
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
          
		  	      <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> Guardar</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    data(){
      return{
        dependencias:[],
        dependencia: { Nombre:'', Direccion:'', Giro:'', Telefono:'', Responsable:'', TipoVinculacion:''}
      }
    },
    methods:{
      agregar(){
        
        if(this.dependencia.Nombre.trim() === '' || this.dependencia.Direccion.trim() === ''){
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }

        /*console.log(this.dependencia.Nombre, this.dependencia.Direccion);*/
        const params = { 
          Nombre:this.dependencia.Nombre, Direccion:this.dependencia.Direccion, Giro:this.dependencia.Giro,
          Telefono:this.dependencia.Telefono, Responsable:this.dependencia.Responsable, TipoVinculacion:this.dependencia.TipoVinculacion
        }

        axios.post('/dependencias', params)
        .then(res => {
          this.dependencias.push(res.data)
          $('#addDepencencia').modal('hide');
        })
      }
    }
  }
</script>

<style>
    
</style>