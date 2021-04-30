<template >  
  <div class="modal fade" id="ModUsuario" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left" style="margin-left: 33%;">
                <p class="subtitulos text-center">Detalle del Usuario</p>
            </div>
            
            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">

            <div class="form-group">
              <label>Nombre</label>
              <span v-if="!usuario.name" class="text-danger" >Requerido*</span>
              <input type="text" class="form-control" placeholder="Ingresa el nombre completo" v-model="usuario.name" >
		  	    </div>

            <div class="form-group">
              <label>Usuario</label>
              <span v-if="!usuario.email" class="text-danger" >Requerido*</span>
              <input type="text" class="form-control" placeholder="Ingresa el nombre del usuario" v-model="usuario.email">
		  	    </div>
              
            <div class="form-check pb-1">
              <input type="checkbox" class="form-check-input" id="checkPassword" v-model="usuario.actualizar_password">
              <label class="form-check-label" for="changePass" id="changePass">
                  Cambiar contraseña
              </label>
            </div>
              
            <div class="form-group" v-if="usuario.actualizar_password">
              <label>Contraseña</label>
              <span v-if="!usuario.password" class="text-danger" >Requerido*</span>
              <input type="password" class="form-control" placeholder="Ingresa la contraseña" v-model="usuario.password">
            </div>

            <div class="form-group" v-if="usuario.actualizar_password">
              <label>Confirmar contraseña</label>
              <span v-if="!usuario.password2" class="text-danger" >Requerido*</span>
              <input type="password" class="form-control" placeholder="Confirmar la contraseña" v-model="usuario.password2">
            </div>

            <form class="was-validated">

              <div class="form-group">
                <label v-if="usuario.role != 1">Tipo de usuario</label>
                <select class="custom-select" name="role" required v-model="usuario.role" v-if="usuario.role != 1">
                  <option value="1">Administrador</option> 
                  <option value="2">Tutor</option> 
                  <option value="3">Orientador</option> 
                  <option value="4">Trabajador social</option> 
                  <option value="5">Maestro</option> 
                </select>
                <div class="invalid-feedback">Seleccione el role para este usuario</div>
              </div>

            </form>

            <button v-if="usuario.role != 1" class="btn btn-danger" @click="eliminarUsuario(usuario)"><i class="far fa-trash-alt"></i> Eliminar</button>
            <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> Actualizar </button>
	  	    </form>
        </div>
      </div>
      
      <alert-modal class="m-5" :message="alertMessage" :type="alertType" :show="showError" nameAlert="modificarModalAlert"></alert-modal>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        usuario: {},
        alertMessage: String,
        showError: false,
        alertType: 'danger',
        checkPassword: false
      }
    },
    created: function() {
      this.$parent.$on('modificarUsuario', usuario => {
        this.usuario = JSON.parse(JSON.stringify(usuario));
        if (this.usuario.roles && this.usuario.roles.length && this.usuario.roles[0]) {
          this.usuario.role = this.usuario.roles[0].id;
        }
        console.log('usuario', this.usuario)
      });
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
         if (this.usuario.id == undefined ||this.usuario.name == undefined || this.usuario.email == undefined ) {

            this.alertMessage = "Llene todos los campos";
            this.showError = true;
            setTimeout(() => { this.showError = false; }, 2000);
          
          }else if (this.checkPassword) {

            if (this.usuario.password == undefined || this.usuario.password2 == undefined) {
                
                this.alertMessage = "Ingrese la nueva contraseña";

            } else if (usuario.password != this.usuario.password2) {

              this.alertMessage = "Las contraseñas no coinciden";
              this.showError = true;
              setTimeout(() => { this.showError = false; }, 2000);

            }else if (this.usuario.role == undefined) {

                this.alertMessage = "Seleccione el role para este usuario";
                this.showError = true;
                setTimeout(() => { this.showError = false; }, 2000);

            } else {     
              axios.put('/usuarios/' + this.usuario.id, this.usuario)
                .then(res => {
                  this.onSuccess(res);
                });
            }
        }
      }
    }
  }
</script>