<template >
  <div class="modal fade" :id="'addPractServenAlumn'+tipo" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #800000">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
      	  <form @submit.prevent="savePractica">
          
            <div class="form-group ml-0">
              <p class="mLabel"><b>Dependencia</b></p>
              <select v-model="practica.IdDependencias">
                  <option  v-for="(dependencia, key) in dependencias" :key="key" :value="dependencia.IdDependencia">{{dependencia.Nombre}}</option>
              </select>
            </div>
          
            <div class="form-group ml-0">
                <label class="mLabel"><b>Fecha Inicio</b></label>
                <input type="date" class="form-control" placeholder="Ingresa la fecha inicial" v-model="practica.FechaInicio">
            </div>
            
            <div class="form-group ml-0">
                <label class="mLabel"><b>Fecha Final</b></label>
                <input type="date" class="form-control" placeholder="Ingresa el nombre de la dependencia" v-model="practica.FechaFin">
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
    props: ['tipo'],
    data() {
      return {
        alumno: {},
        practica: {},
        dependencias: []
      }
    }, 
    created() {
      this.$parent.$on('agregarPracticaAlumno', alumno => {
        console.log('wlkdjwlk');
        this.practica = {};
        this.alumno = alumno;
        axios.get('/dependencias').then(res => {
          this.dependencias = res.data;
        });
      });
    },
    methods: {
      savePractica() {
        if (this.dependencias.IdDependencia == undefined || this.practica.FechaInicio == undefined 
            || this.practica.FechaFin == undefined) {
            alert('Verifique y llene todos los campos');
            return;
        }

        this.practica.Tipo = this.tipo == 'ss' ? 'Servicio Social' : 'Practicas Profesionales';

        console.log(this.practica);

        axios.post('/trabajosocial/' + this.alumno.IdAlumno + '/practica', this.practica).then(res => {
          // cerrar modal
          this.$emit('practicaAlumnoAgregada', res.data);
           $('#addPractServenAlumn'+this.tipo).modal('hide');
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
    .mLabel {
      font-size: 16px;
    }
</style>