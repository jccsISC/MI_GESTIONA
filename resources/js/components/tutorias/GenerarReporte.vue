<template>
    <div class="modal fade" role="dialog" id="reporteTuto" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Reporte de seguimiento</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <form @submit.prevent="guardarReporte" class="modal-body-g">
                    <button  class="btn btn-success" @click="reporte.Status = 1">concluyó</button>
                    <button  class="btn btn-warning" @click="reporte.Status = 0">pendiente</button>
                    <p>Fecha: {{new Date().getDate()}}-{{new Date().getMonth()+1}}-{{new Date().getFullYear()}}</p>
                    <p class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                    <p class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</p>
                    <p class="m-0"><b>Nombre de quien lo deriva: </b>{{reporte.Nombrequienderiva}}</p>
                    <select class="form-control" v-model="reporte.IdFamiliar">
                        <option v-for="(familiar, key) in familiares " :key="key" :value="familiar.IdFamiliar">{{familiar.Nombre + ' '+familiar.ApePaterno+ ' '+ familiar.ApeMaterno}}</option>
                    </select>
                    <p class="m-0"><b>Telefono: </b>{{obtenerTelefono()}}</p>
                        
                    <div class="form-group">
                        <p class="m-0">Motivo</p> 
			            <textarea v-model="reporte.Motivo" name="" id="" class="form-control" placeholder="Escriba aquí los motivos"></textarea>
		  	        </div>

                    <div class="form-group">
			          <p class="m-0">Derivación</p>
			          <input v-model="reporte.Derivacion" type="text" class="form-control" placeholder="Escriba aquí a donde lo deriva">
		  	        </div>

                    <div class="form-group">
                        <p class="m-0">Descripción de la derivación</p> 
			            <textarea v-model="reporte.DescripcionDer" name="" id="" class="form-control" placeholder="Escriba aquí la descripción de la deribación"></textarea>
	  	            </div>
                    
                    <div class="form-group ">
                        <p class="m-0">Observaciones</p>
			            <input v-model="reporte.Observaciones" type="text" class="form-control" placeholder="Ingresa aquí las observaciones">
		  	        </div>
                    
                    <div class="form-group ">
                        <p class="m-0">Seguimiento</p>
			            <input v-model="reporte.Seguimiento" type="text" class="form-control" placeholder="Ingresa aquí el seguimiento que se dará">
		  	        </div>

                    <p class="m-0">Responsable de seguimiento</p> 
                    <select v-model="reporte.ResponsableSeguimiento" class="mdb-select md-form colorful-select dropdown-primary">
                        <option value="Salvador Alcazar Molina">Salvador Alcazar Molina</option>
                        <option value="Brenda Yaret">Brenda Yaret</option>
                        <option value="Cesar Gonzalez">Cesar Gonzalez</option>
                    </select>
                     <button  type="submit" class="mibtn">
                        <i class="fas fa-plus-circle"> Guardar</i>
                    </button>
                </form>
                
            </div>
        </div>
    </div>

</template>

<script>
    export default {
         data() {
            return {
                alumno: {},
                reporte: {},
                familiares: []
            }
        },
        created() {
            this.$parent.$on('generarReporte', alumno => {              
                this.alumno = alumno;   
                this.reporte.Nombrequienderiva = 'PSIC. JOSÉ SALVADOR ALCAZAR MOLINA';
                this.reporte.IdAlumno = alumno.IdAlumno; 
                this.jalarFamiliares();      
            });
        },
        methods: {
            jalarFamiliares() {
                axios.get('alumnos/'+this.alumno.IdAlumno+'/familiares').then(res=>{
                this.familiares = res.data;
                });
            },
            obtenerTelefono() {
                let telefono = '';
                if (!this.reporte.IdFamiliar || !this.familiares) {
                    return telefono;
                }
                this.familiares.forEach(familiar => {
                    if (familiar.IdFamiliar === this.reporte.IdFamiliar) {
                        telefono = familiar.Telefono;
                    }
                });
                return telefono;
            },
            guardarReporte() {

                if (this.reporte.Status = '') {
                    alert('Seleccione el estatus');
                }

                axios.post('/yonoAbandono', this.reporte).then(res => {
                    //window.location.href = '/T';
                });
            }
        }
    }
</script>

<style>

.mibtn{
        background: #800000;
        border-radius: 4px;
        color: white;
        outline: none;
        padding-left:5px;
        padding-right: 5px; 
        border: 1px solid #800000;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .miBtn:hover{
        background-color: rgb(255, 255, 255);
        color: rgb(167, 11, 11);
        border: 1px solid #800000;
    }

    .descrip{
        min-width: 40%;
        min-height: 150px;
        border: 1px solid rgb(31, 30, 30);
        border-radius: 6px;
        padding: 5px;
    }

</style>