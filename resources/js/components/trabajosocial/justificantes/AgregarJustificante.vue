<template >  
  <div class="modal fade" id="addJustificantes" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div>
            <div class="float-left pl-2"  style="margin-left: 22%;">
                <p class="subtitulos text-center">Crear Justificante/Pase de salida</p>
            </div>
            
            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                <span style="color: #800000">&times;</span>
            </button>
        </div>

        <hr class="mt-1">

        <div class="modal-body">
          <form @submit.prevent="onSubmit">
            <div v-if="!ver" class="form-group">
			          <select v-model="tipo">
                  <option value="justificante">Justificante</option>
                  <option value="pase">Pase de Salida</option>
                </select>
            </div>

            <button  v-if="ver" class="btn mibtnE btn-sm float-right p-0 pl-1 pr-1" @click="eliminarJustiPase()">
              <i class="far fa-trash-alt"></i>
            </button>
              

            <button v-if="ver" type="button" class="mibtnI btnImprimirPase ">
              <i class="fas fa-print"></i>
               <a href="imprimirJust">Imprimir Justificante</a>
            </button>
            
            <button v-if="ver" type="button" class="mibtnI btnImprimirPase ">
              <i class="fas fa-print"></i>
               <a href="imprimirPase">Imprimir PAse</a>
            </button>

            <div v-if="tipo === 'justificante'" class="form-group">
			          <label><b>Fecha Inicio</b></label>
			          <input :disabled="ver" type="date" class="form-control" placeholder="Ingresa la fecha inicial" v-model="justificante.FechaInicio">
		  	    </div>
		  	  
            <div v-if="tipo === 'justificante' " class="form-group">
			          <label><b>Fecha Fin</b></label>
			          <input :disabled="ver" type="date" class="form-control" placeholder="Ingresa la fecha final" v-model="justificante.FechaFin">
		  	    </div>

            <div v-if="tipo === 'justificante' " class="form-group">
			          <label><b>Motivo</b></label>
			          <input :disabled="ver" type="text" class="form-control" placeholder="Ingresa el motivo del justificante" v-model="justificante.Motivo">
		  	    </div>

            <div v-if="tipo === 'pase' " class="form-group">
			          <label :disabled="ver"><b>Fecha: </b> 2020-01-29</label>
		  	    </div>

            <div v-if="tipo === 'pase' " class="form-group">
			          <label><b>Familiar</b></label>
			          <select v-if="!ver" type="text" class="form-control" v-model="pase.IdFamiliar">
                  <option v-for="(familiar, key) in familiares " :key="key" :value="familiar.IdFamiliar">{{familiar.Nombre + ' '+familiar.ApePaterno+ ' '+ familiar.ApeMaterno}}</option>
                </select>

                <select :disabled="ver" v-if="ver" type="text" class="form-control" v-model="pase.familiar.IdFamiliar">
                  <option :value="pase.familiar.IdFamiliar">{{pase.familiar.Nombre + ' '+pase.familiar.ApePaterno+ ' '+ pase.familiar.ApeMaterno}}</option>
                </select>
		  	    </div>
		  	  
            <div v-if="tipo === 'pase' " class="form-group">
			          <label><b>Motivo</b></label>
			          <input :disabled="ver" type="text" class="form-control" placeholder="Ingresa el motivo del justificante" v-model="pase.Motivo">
		  	    </div>

            <div v-if="tipo === 'pase' " class="form-group">
			          <label><b>Descripción</b></label>
			          <input :disabled="ver" type="text" class="form-control" placeholder="Ingresa la descripcion" v-model="pase.Descripcion">
		  	    </div>
		  	  
		  	    <button v-if="!ver" type="submit" class="btn miBtn float-right p-0 pl-1 pr-1"><i class="far fa-save"></i> Guardar</button>
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
        ver: false,
        fecha: ''
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
        if (this.justificante.FechaInicio == undefined || this.justificante.FechaFin == undefined 
            || this.justificante.Motivo == undefined) {
            alert('Verifique y llene todos los campos');
            return;
        }

        axios.post('/trabajosocial/'+ this.alumno.IdAlumno+'/justificantes', this.justificante)
        .then(res => {
            this.$emit('justificanteGuardado', res.data);
            $('#addJustificantes').modal('hide');
        });
      },
      savePase() {
        if (this.pase.IdFamiliar == undefined || this.pase.Motivo == undefined 
            || this.justificante.Motivo == undefined || this.pase.Descripcion == undefined) {
            alert('Verifique y llene todos los campos');
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
    .btnImprimirPase{
        float: right;
        top: 110px;
        margin-right: 10px;
    }

    .mibtnE{
        background: #c40404;
        border-radius: 4px;
        color: white;
        outline: none;
        padding-left:5px;
        padding-right: 5px; 
        border: 1px solid #c40404;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .mibtnE:hover{
        background-color: rgb(255, 255, 255);
        color: rgb(167, 11, 11);
        border: 1px solid #800000;
    }

    .mibtnI{
        background: #416de7;
        border-radius: 4px;
        color: white;
        outline: none;
        padding-left:5px;
        padding-right: 5px; 
        border: 1px solid #416de7;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .mibtnI:hover{
        background-color: rgb(255, 255, 255);
        color: #416de7;
        border: 1px solid #416de7;
    }
</style>