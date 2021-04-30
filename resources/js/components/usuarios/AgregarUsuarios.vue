<template >  
  <div class="modal fade" id="addUsuario" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div>
            <div class="float-left" style="margin-left: 36%">
              <p class="subtitulos text-center">Agregar usuario</p>
            </div>    
            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
            <div  class="form-group">
			          <label>Identificador</label>
                 <span v-if="!usuario.id" class="text-danger" >Requerido*</span>
			          <input  type="number" class="form-control" max="9999999999" maxlength="10" placeholder="Ingresa el numero de nómina" id="matricula" v-model="usuario.id">
		  	    </div>
            <div class="form-group">
			          <label>Nombre</label>
                <span v-if="!usuario.name" class="text-danger" >Requerido*</span>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre completo" v-model="usuario.name">
		  	    </div>
            
            <div class="form-group">
			          <label>Usuario</label>
                <span v-if="!usuario.email" class="text-danger" >Requerido*</span>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre del usuario" v-model="usuario.email">
		  	    </div>
            
            <div class="form-group" >
              <label>Contraseña</label>
              <span v-if="!usuario.password" class="text-danger" >Requerido*</span>
              <input type="password" class="form-control" placeholder="Ingresa la contraseña" v-model="usuario.password" id="password" />
              <span class="eyesPosition"><i class="showIcon fa fa-eye" aria-hidden="true" id="eye" @click="toogle()"></i></span>
            </div>

            <div class="form-group">
			        <label>Confirmar contraseña</label>
              <span v-if="!usuario.password2" class="text-danger" >Requerido*</span>
			        <input type="password" class="form-control" placeholder="Confirmar la contraseña" v-model="usuario.password2" id="password2">
              <span class="eyesConfirm"><i class="showIcon fa fa-eye" aria-hidden="true" id="eye2" @click="toogle2()"></i></span>
		  	    </div>

            <form class="was-validated">
                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="custom-select" name="role" required v-model="usuario.role">
                      <option value="2">Tutor</option> 
                      <option value="3">Orientador</option> 
                      <option value="4">Trabajador social</option> 
                      <option value="5">Maestro</option> 
                  </select> 
                </div>
            </form>

		  	    <button type="submit" class="btn btn-primary float-right" ><i class="far fa-save"></i> Guardar </button>
	  	    </form>
        </div>
      </div>
      
      <alert-modal class="m-5" :message="alertMessage" :type="alertType" :show="showError" nameAlert="agregarUsuarioModalAlert"></alert-modal>
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
        showPassword: false,
         showPassword2: false,
      }
    },
    created: function() {
      this.$parent.$on('actualizarUsuario', usuario => {
        this.usuario = JSON.parse(JSON.stringify(usuario));
      });
    },  
    methods: {
      toogle() {
        if (this.showPassword) {
          document.getElementById("password").setAttribute("type", "password");
           this.showPassword = false;
           document.getElementById("eye").style.color = '#7a797e';
        }else {
          document.getElementById("password").setAttribute("type", "text");
           this.showPassword = true;
            document.getElementById("eye").style.color = '#800000';
        }
      },
      toogle2() {
        if (this.showPassword2) {
          document.getElementById("password2").setAttribute("type", "password");
           this.showPassword2 = false;
           document.getElementById("eye2").style.color = '#7a797e';
        }else {
          document.getElementById("password2").setAttribute("type", "text");
           this.showPassword2 = true;
            document.getElementById("eye2").style.color = '#800000';
        }
      },
      onSubmit() {
        if (this.usuario.id == undefined) {
            this.alertMessage = "Ingrese el número de nómina";
            this.showError = true;
            setTimeout(() => { this.showError = false; }, 2000);
        } else if (this.usuario.id < 10) {
          this.alertMessage = "Ingrese correctamente la nómina";
          this.showError = true;
          setTimeout(() => { this.showError = false; }, 2000);
        } else if (this.usuario.id) {
          this.saveUsuario()
        }
      },
       onSuccess(res) {
        this.$emit('usuarioActualizado', res.data);
        $('#addUsuario').modal('hide');
      },
      saveUsuario() {
               if (this.usuario.id == undefined 
                    ||this.usuario.name == undefined 
                    || this.usuario.email == undefined
                    || this.usuario.password == undefined 
                    || this.usuario.password2 == undefined ) {
                    this.alertMessage = "Llene todos los campos";
                    this.showError = true;
                    setTimeout(() => { this.showError = false; }, 2000);
                }else if (usuario.password != this.usuario.password2) {
                    this.alertMessage = "Las contraseñas no coinciden";
                    this.showError = true;
                    setTimeout(() => { this.showError = false; }, 2000);
                }else if (this.usuario.role == undefined) {
                    this.alertMessage = "Seleccione el role para este usuario";
                    this.showError = true;
                    setTimeout(() => { this.showError = false; }, 2000);
                } else {
                      axios.post('/usuarios', this.usuario)
                      .then(res => {
                        res.data.esNueva = true;
                        this.onSuccess(res);
                      });
                }
      }
    }
  }
</script>

<style>
  .showIcon,
  .hideIcon {
    position: absolute;
    right: 20px;
    font-size: 24px;
    color: #7a797e;
  }
  .hideIcon {
    display: none;
  }
  
  .eyesPosition {
    position: absolute;
    right: 2%;
    top: 54%;
  }

  .eyesConfirm {
    position: absolute;
    right: 2%;
    top: 68.4%;
  }
</style>