<template >  
  <div class="modal fade" id="addJustificantes" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ver ? 'Ver':'Crear'}} {{tipo === 'pase' ? 'Pase de salida':'justificante'}} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
            <div v-if="!ver" class="form-group">
			          <select v-model="tipo">
                  <option value="justificante">Justificante</option>
                  <option value="pase">Pase de Salida</option>
                </select>
            </div>

            <button  v-if="ver" class="btn btn-danger btn-sm float-right p-0 pr-xl-1 pl-xl-1" @click="eliminarJustiPase()"><i class="far fa-trash-alt"></i></button>

            <div v-if="tipo === 'justificante' " class="form-group">
			          <label>Fecha Inicio</label>
			          <input :disabled="ver" type="date" class="form-control" placeholder="Ingresa la fecha inicial" v-model="justificante.FechaInicio">
		  	    </div>
		  	  
            <div v-if="tipo === 'justificante' " class="form-group">
			          <label>Fecha Fin</label>
			          <input :disabled="ver" type="date" class="form-control" placeholder="Ingresa la fecha final" v-model="justificante.FechaFin">
		  	    </div>
		  	  
            <div v-if="tipo === 'justificante' " class="form-group">
			          <label>Motivo</label>
			          <input :disabled="ver" type="text" class="form-control" placeholder="Ingresa el motivo del justificante" v-model="justificante.Motivo">
		  	    </div>

            <div v-if="tipo === 'pase' " class="form-group">
			          <label>Familiar</label>
			          <select v-if="!ver" type="text" class="form-control" v-model="pase.IdFamiliar">
                  <option v-for="(familiar, key) in familiares " :key="key" :value="familiar.IdFamiliar">{{familiar.Nombre + ' '+familiar.ApePaterno+ ' '+ familiar.ApeMaterno}}</option>
                </select>

                <select :disabled="ver" v-if="ver" type="text" class="form-control" v-model="pase.familiar.IdFamiliar">
                  <option :value="pase.familiar.IdFamiliar">{{pase.familiar.Nombre + ' '+pase.familiar.ApePaterno+ ' '+ pase.familiar.ApeMaterno}}</option>
                </select>
		  	    </div>
		  	  
            <div v-if="tipo === 'pase' " class="form-group">
			          <label>Motivo</label>
			          <input :disabled="ver" type="text" class="form-control" placeholder="Ingresa el motivo del justificante" v-model="pase.Motivo">
		  	    </div>

            <div v-if="tipo === 'pase' " class="form-group">
			          <label>Descripción</label>
			          <input :disabled="ver" type="text" class="form-control" placeholder="Ingresa la descripcion" v-model="pase.Descripcion">
		  	    </div>
		  	  
		  	    <button v-if="!ver" type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i>Guardar</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  export default {
    created: function() {
      this.$parent.$on('agregarJustificante', alumno => {
        this.alumno = alumno;
        this.justificante={};
        this.pase={};
        this.ver=false;
        this.tipo = 'justificante';
        this.jalarFamiliares();
      });
      this.$parent.$on('verJustificante', justificante => {
        this.justificante = justificante;
        this.pase={};
        this.ver = true;
        this.tipo = 'justificante';
      });
      this.$parent.$on('verPase', pase => {
        this.pase = pase;
        this.justificante={};
        this.ver = true;
        this.tipo = 'pase';
      });
    },  
    data() {
      return {
        alumno: {},
        justificante: {},
        pase: {},
        tipo: 'justificante',
        familiares: [],
        ver: false
      }
    },
    methods: {
      jalarFamiliares(){
        axios.get('alumnos/'+this.alumno.IdAlumno+'/familiares').then(res=>{
          this.familiares = res.data;
        });
      },
      onSubmit(){
        if(this.ver){
          return;
        }
        if(this.tipo === 'pase'){
          this.savePase();
        }else{
          this.saveJustificante();
        }
      },
      saveJustificante() {
        if (this.justificante.FechaInicio.trim() === '' || this.justificante.FechaFin.trim() === '' || this.justificante.Motivo.trim() === '' ) {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }

        axios.post('/trabajosocial/'+ this.alumno.IdAlumno+'/justificantes', this.justificante)
        .then(res => {
            this.$emit('justificanteGuardado', res.data);
            $('#addJustificantes').modal('hide');
        });
      },
      savePase() {
        if (this.pase.Motivo.trim() === '' || this.pase.IdFamiliar == '' || this.pase.Descripcion.trim() === '') {
          alert('Debes de completar todos los campos antes de guardar');
          return;
        }

        axios.post('/trabajosocial/'+ this.alumno.IdAlumno+'/pases', this.pase)
        .then(res => {
            this.$emit('paseGuardado', res.data);
            $('#addJustificantes').modal('hide');
        });
      },
      eliminarJustiPase(){
        if(this.tipo === 'justificante'){
          axios.delete('/justificantes/'+this.justificante.IdJustificante).then(res =>{
            this.$emit('justificanteEliminado', this.justificante.IdJustificante);
            $('#addJustificantes').modal('hide');
          });
        }else{
             axios.delete('/pases/'+this.pase.IdPaseSal).then(res =>{
            this.$emit('paseEliminado', this.pase.IdPaseSal);
            $('#addJustificantes').modal('hide');
          });
        }
      }
    }
  }
</script>

<style>
    
</style>