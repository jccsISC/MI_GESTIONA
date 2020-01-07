<template >  
  <div class="modal fade" id="addBeca" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{beca.IdBeca ? 'Actualizar' : 'Agregar'}} Beca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
              <div class="form-group">
			          <label>Nombre</label>
			          <input type="text" class="form-control" placeholder="Ingresa el nombre de la beca" v-model="beca.Nombre">
		  	      </div>
		  	    
              <div class="form-group">
			          <label>Tipo</label>
			          <select class="form-control" v-model="beca.Tipo">
                  <option value="Interno">Interno</option>
                  <option value="Externo">Externo</option>
                  <option value="Otro">Otro</option>
                </select>
		  	      </div>

          
          
		  	      <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i> {{beca.IdBeca ? 'Actualizar' : 'Guardar'}}</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    created: function() {
      this.$parent.$on('actualizarBeca', beca => {
        this.beca = JSON.parse(JSON.stringify(beca));
        if (!this.beca.Tipo) {
          this.beca.Tipo = 'Interno';
        }
      });
    },  
    data() {
      return {
        beca: {}
      }
    },
    methods: {
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
        if (this.beca.Nombre.trim() === '' || this.beca.Tipo.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }

        axios.put('/becas/' + this.beca.IdBeca, this.beca)
          .then(res => {
            this.onSuccess(res);
          });
      },
      saveBeca() {
        if (this.beca.Nombre.trim() === '' || this.beca.Tipo.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
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

<style>
    
</style>