<template>
    <div class="modal fade" role="dialog" id="reporteConducta" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Reporte de Mala conducta</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                    <div class="modal-body-g">
                        <p>Fecha: {{new Date().getDate()}}-{{new Date().getMonth()+1}}-{{new Date().getFullYear()}}</p>
                        <p class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                        <p class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</p>
                        <p class="m-0"><b>Grupo: </b>{{alumno.Grupo}}</p>
                        <p class="m-0"><b>Telefono: </b>{{alumno.Telefono}}</p>
                        <p class="m-0"><b>Nombre de quien lo deriva: </b>{{incidencia.ResponsableSeguimiento}}</p>
                        <select class="form-control" v-model="incidencia.IdFamiliar">
                            <option v-for="(familiar, key) in familiares " :key="key" :value="familiar.IdFamiliar">{{familiar.Nombre + ' '+familiar.ApePaterno+ ' '+ familiar.ApeMaterno}}</option>
                        </select>
                        <p class="m-0"><b>Telefono: </b>{{obtenerTelefono()}}</p>
                            
                        <div class="form-group">
                            <p class="m-0">Descripció del reporte</p> 
                            <textarea v-model="incidencia.DescripcionReporte" name="" id="" class="form-control" placeholder="Escriba aquí una descripcón del reporte"></textarea>
                        </div>


                        <div class="form-group">
                            <p class="m-0">Comentario de quien le da seguimiento</p> 
                            <textarea v-model="incidencia.Comentarios" name="" id="" class="form-control" placeholder="Escriba aquí los comentarios"></textarea>
                        </div>
                        
                        <select v-model="incidencia.TipoFalta">Tipo de reporte
                            <option value="Leve">Leve</option>
                            <option value="Grave">Grave</option>
                            <option value="Muy Grave">Muy Grave</option>
                        </select>

                        <div class="form-group">
                            <p class="m-0">Comentario del Padre o Tutor</p>
                            <textarea v-model="incidencia.ComentariosPa" type="text" class="form-control" placeholder="Escriba aquí los comentariso del padre"></textarea>
                        </div>

                        <div class="form-group">
                            <p class="m-0">Observaciones</p>
                            <input v-model="incidencia.Observaciones" type="text" class="form-control" placeholder="Escriba aquí las Observaciones">
                        </div>

                        <div class="form-group">
                            <p class="m-0">Derivación</p>
                            <input v-model="incidencia.Derivacion" type="text" class="form-control" placeholder="Escriba aquí la derivación">
                        </div>

                        <button  class="btn btn-success" @click="incidencia.Status = 1">concluyó</button>
                        <button  class="btn btn-warning" @click="incidencia.Status = 0">pendiente</button>
                        
                
                    </div>
                    <div class="modal-footer">
                        <button @click="guardarReporte" class="mibtn">
                            <i class="fas fa-plus-circle"> Guardar</i>
                        </button>
                    </div>
            </div>
        </div>
    </div>

</template>

<script>
    import bus from '../../../event-bus';
    export default {
         data() {
            return {
                alumno: {},
                incidencia: {},
                familiares: []
            }
        },
        created() {
            this.$parent.$on('generarMalaConducta', alumno => {              
                this.alumno = alumno;   
                this.incidencia = {};
                this.incidencia.IdAlumno = alumno.IdAlumno; 
                this.incidencia.ResponsableSeguimiento = 'CESAR';
                this.jalarFamiliares();      
            });
             this.$parent.$on('verIncidencia', incidencia => {
                this.incidencia = incidencia;
                this.incidencia={};
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
                if (!this.incidencia.IdFamiliar || !this.familiares) {
                    return telefono;
                }
                this.familiares.forEach(familiar => {
                    if (familiar.IdFamiliar === this.incidencia.IdFamiliar) {
                        telefono = familiar.Telefono;
                    }
                });
                return telefono;
            },
            guardarReporte() {
                if (this.incidencia.Status == undefined) {
                    alert('Seleccione el estatus');
                    return;
                }

                axios.post('/incidencias', this.incidencia).then(res => {
                    //window.location.href = '/T';
                    $('#reporteConducta').modal('hide');
                    bus.$emit('incidenciaAgregada', res.data);
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