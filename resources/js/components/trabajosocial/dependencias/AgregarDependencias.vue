<template >  
  <div class="modal fade" id="addDepencencia" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left pl-2" style="margin-left: 28%; margin-right: 20%;">
                <p class="subtitulos text-center">{{dependencia.IdDependencia ? 'Actualizar' : 'Agregar'}} Dependencia</p>
            </div>
            
            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <hr class="mt-1">

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
              <div class="form-group">
			          <label><b>Nombre</b></label>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre de la dependencia" required v-model="dependencia.Nombre">
		  	      </div>
		  	    
              <div class="form-group">
			          <label><b>Dirección</b></label>
			          <input type="text" class="form-control" placeholder="Ingresa la dirección de la dependencia" required v-model="dependencia.Direccion">
		  	      </div>

              <div class="form-group">
			          <label><b>Giro</b></label>
			          <input type="text" class="form-control" placeholder="Ingresa el giro de la dependencia" required v-model="dependencia.Giro">
		  	      </div>
                
              <div class="form-group">
			          <label><b>Telefono</b></label>
			          <input type="number" class="form-control" placeholder="Ingresa el telefono de la dependencia" required v-model="dependencia.Telefono">
		  	      </div>

              <div class="form-group">
			          <label><b>Responsable</b></label>
			          <input type="text" class="form-control" placeholder="Ingresa el responsable de la dependencia" required v-model="dependencia.Responsable">
		  	      </div>

              <div class="form-group">
			          <label><b>Tipo de vinculación</b></label>
			          <input type="text" class="form-control" placeholder="Ingresa el tipo de vinculación de la dependencia" required v-model="dependencia.TipoVinculacion">
		  	      </div>
        
              <button type="button" class="btn btn-danger" @click="eliminarDependencia(dependencia, keydependencia)"><i class="far fa-trash-alt"></i> Eliminar</button>
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
        // if (this.dependencia.Nombre.trim() === '' || this.dependencia.Direccion.trim() === '') {
        //   alert('Debes de completar todos los campos antes de guardar');
        //   return;
        // }

        axios.put('/dependencias/' + this.dependencia.IdDependencia, this.dependencia)
          .then(res => {
            this.onSuccess(res);
          });
      },
      saveDependencia() {
        if (this.dependencia.Nombre == undefined || this.dependencia.Direccion == undefined 
            || this.dependencia.Giro == undefined || this.dependencia.Telefono == undefined
            || this.dependencia.Responsable == undefined || this.dependencia.TipoVinculacion == undefined) {
            alert('Verifique y llene todos los campos');
            return;
        }
        
        axios.post('/dependencias', this.dependencia)
          .then(res => {
            res.data.esNuevo = true;
            console.log(res.data);
            this.onSuccess(res);
          });
      },
        eliminarDependencia(dependencia, key) {
            const confirmacion = confirm(`¿Está seguro que desea eliminar la dependencia ${dependencia.Nombre}?`);
            // Lo elimina en la base de datos.
            if(confirmacion){
            axios.delete(`/dependencias/${dependencia.IdDependencia}`)
            .then(res => {
                // Lo elimina de manera visual.
                this.dependencias.splice(key,1);
            })
        }
      }
    }
  }
</script>

<style>
    
</style>