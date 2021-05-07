<template >  
  <div class="modal fade" id="addBeca" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                <p class="subtitulos text-center">{{beca.IdBeca ? 'Actualizar' : 'Agregar'}} Beca</p>
            </div>
            
            <button type="button" class="close mr-1" data-dismiss="modal"  aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <hr class="mt-1">

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
              <div class="form-group">
			          <label>Nombre</label>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre de la beca" required v-model="beca.Nombre">
		  	      </div>
		  	    
              <div class="form-group">
			          <label>Tipo</label>
			          <select class="form-control" required v-model="beca.Tipo">
                  <option value="Interno">Interno</option>
                  <option value="Externo">Externo</option>
                  <option value="Otro">Otro</option>
                </select>
		  	      </div>
                
              <button type="button" class="btn btn-danger" @click="eliminarBeca(beca)"><i class="far fa-trash-alt"> Eliminar</i></button>
                                  
		  	      <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> {{beca.IdBeca ? 'Actualizar' : 'Guardar'}}</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    props: ['onDelete'],
    data() {
      return {
        beca: {}
      }
    },
    created: function() {
      this.$parent.$on('actualizarBeca', beca => {
        this.beca = JSON.parse(JSON.stringify(beca));
        if (!this.beca.Tipo) {
          this.beca.Tipo = 'Interno';
        }
      });
    },  
    methods: {
       eliminarBeca(beca) {
        this.onDelete(beca);
        $('#addBeca').modal('hide');
      },
      onSubmit() {
        if (this.beca.IdBeca) {
          this.actualizarBeca();
        } else {
          this.saveBeca();
        }
      },
       onSuccess(res) {
        this.$emit('becaActualizada', res.data);
        $('#addBeca').modal('hide');
      },
      actualizarBeca() {
        // if (this.beca.Nombre.trim() === '' || this.beca.Tipo.trim() === '') {
        //   alert('Debes de completar todos los campos antes de guardar');
        //   return;}
        axios.put('/becas/' + this.beca.IdBeca, this.beca)
          .then(res => {
            this.onSuccess(res);
          });
      },
      saveBeca() {
        if (this.beca.Nombre == undefined || this.beca.Tipo == undefined) {
            alert('Verifique y llene todos los campos');
            return;
        }

        axios.post('/becas', this.beca)
          .then(res => {
            res.data.esNueva = true;
            this.onSuccess(res);
          });
      }
    }
  }
</script>
