<template >  
  <div class="modal fade" id="ModUsuario" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #800000">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
        
              <div class="form-group">
			          <label>Nombre</label>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre completo" v-model="usuario.name">
		  	      </div>
            <div class="form-group">
			          <label>Usuario</label>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre del usuario" v-model="usuario.email">

		  	      </div>
              <div class="form-group">
			          <label>Contraseña</label>
			          <input type="password" class="form-control" placeholder="Ingresa la contraseña" v-model="usuario.password">
		  	      </div>

                   <div class="form-group">
			          <label>Confirmar Contraseña</label>
			          <input type="password" class="form-control" placeholder="Confirmar la contraseña" v-model="usuario.password2">
		  	      </div>
		  	    
              <div class="form-group">
			          <label>Tipo de Usuario</label>
			          <select name="role" required v-model="usuario.role">
                <option value="1">Administrador</option> 
                <option value="2">Tutor</option> 
                <option value="3">Orientador</option> 
                <option value="4">Trabajador social</option> 
                <option value="5">Maestro</option> 
              </select>
		  	      </div>

		  	      <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> Actualizar </button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    created: function() {
      this.$parent.$on('modificarUsuario', usuario => {
        this.usuario = JSON.parse(JSON.stringify(usuario));
      }
  
      );
    },  
    data() {
      return {
        usuario: {}
        
      }
    },
    methods: {
      onSubmit() {
         
        if (this.usuario.id) {
     
          this.modificarUsuario();
           
         
        }
      },
       onSuccess(res) {
      
        this.$emit('usuarioActualizado', res.data);
        $('#ModUsuario').modal('hide');
      },
      modificarUsuario() {
            
  
        if (this.usuario.name.trim() === '' || this.usuario.email.trim() === '' || this.usuario.password.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }
    
        axios.put('/usuarios/' + this.usuario.id, this.usuario)
          .then(res => {
            this.onSuccess(res);
         
          });
      }
    }
  }
</script>

<style>
    
</style>