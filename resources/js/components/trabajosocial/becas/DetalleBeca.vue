<template >  
  <div class="modal fade" id="DetalleBeca" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left pl-2" style="margin-left: 28%;">
                <p class="subtitulos text-center">Agregar beca al alumno</p>
            </div>
            
            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <hr class="mt-1">
        
        <div class="modal-body">
      	  <form @submit.prevent="saveBeca">
	          <div class="form-group">
			        <label>Nombre</label>
			        <select class="custom-select" required v-model="becaSeleccionada">
                <option  v-for="(beca, key) in becas" :key="key" :value="beca.IdBeca">{{beca.Nombre}} - {{beca.Tipo}}</option>
              </select>
		  	    </div>
		  	   
		  	    <button type="submit" class="btn miBtn float-right p-0 pl-1 pr-1"><i class="far fa-save"></i> Guardar</button>
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
          alert('No puede tener dos becas del mismo tipo');
          console.log('no es valido');
          console.log(error);
        });
      }
    }
  }
</script>

<style>
    
</style>