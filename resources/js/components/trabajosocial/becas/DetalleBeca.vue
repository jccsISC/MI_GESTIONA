<template >  
  <div class="modal fade" id="DetalleBeca" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Becas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      	  <form @submit.prevent="saveBeca">
	          <div class="form-group">
			        <label>Nombre</label>
			        <select v-model="becaSeleccionada">
                <option  v-for="(beca, key) in becas" :key="key" :value="beca.IdBeca">{{beca.Nombre}} - {{beca.Tipo}}</option>
              </select>
		  	    </div>
		  	   
		  	    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>

	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    data() {
      return {
        becas: [],
        alumno: {},
        becaSeleccionada: null
      }
    }, 
    created() {
      this.$parent.$on('agregarBecaAlumno', alumno => {
        this.alumno = alumno;
        axios.get('/becas').then(res => {
          this.becas = res.data;
        });
      });
    },
    methods: {
      saveBeca() {
        if (!this.becaSeleccionada) {
          return '';
        }

        axios.post('/trabajosocial/' + this.alumno.IdAlumno + '/becas/' + this.becaSeleccionada).then(res => {
          // cerrar modal
          this.$emit('becaAlumnoAgregada', res.data);
           $('#DetalleBeca').modal('hide');
        })
        .catch(error => {
          console.log('no es valido');
          console.log(error);
        });
      }
    }
  }
</script>

<style>
    
</style>