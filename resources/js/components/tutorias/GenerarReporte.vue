<template>
    <div class="modal fade" role="dialog" id="reporteTuto" style="z-index: 100000" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div>
                    <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
                        <p class="subtitulos text-center">Reporte de seguimiento</p>
                    </div>
                    
                    <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                        <span style="color: #800000">&times;</span>
                    </button>
                </div>

                <div class="modal-body-g p-3 bordeReport colorText">
                    <div class="imageLogo">
                        <img src="images/logo.jpg" alt="">
                    </div>

                    <div class="float-right mt-5">
                        <button  class="btn btn-success m-0 p-0 pr-2 pl-2" @click="reporte.Status = 1"><i class="fas fa-check"></i></button>
                        <button  class="btn btn-warning m-0 p-0 pr-2 pl-2" @click="reporte.Status = 0"><i class="fas fa-exclamation-triangle"></i></button>
                    </div>

                    <div class="text-center">
                        <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
                        <p class="m-0" style="padding-right:110px;">PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
                        <p class="m-0" style="text-decoration: underline; padding-left:80px;">FORMATO YO NO ABANDONO</p>
                        <p class="m-0" style="padding-left:80px;">SEGUIMIENTO Y DERIVACION</p>
                    </div>

                    <p class="text-right"><b>Fecha: </b> {{new Date().getDate()}}-{{new Date().getMonth()+1}}-{{new Date().getFullYear()}}</p>
                    <label class="m-0"><b>Alumno: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</label>
                    <label class="m-0 ml-2"><b>Grupo: </b>{{alumno.Grupo}}</label>
                    <p class="m-0"><b>Nombre de quien lo deriva: </b>{{reporte.Nombrequienderiva}}</p>
                    
                    <div class="miGrid2 mt-1">
                        <p v-if="errors.length">
                            <b>Por favor, corrija el(los) siguiente(s) error(es): </b>
                            <ul>
                                <li v-for="(error, key) in errors" :key="key">{{error}}</li>
                            </ul>
                        </p>

                        <div>
                            <label class="m-0"><b>Padre o Tutor: </b></label>
                            <select  v-model="reporte.IdFamiliar" id="numero" name="numero">
                                <option v-for="(familiar, key) in familiares " :key="key" :value="familiar.IdFamiliar">{{familiar.Nombre + ' '+familiar.ApePaterno+ ' '+ familiar.ApeMaterno}}</option>
                            </select>
                            <p><b>Telefono: </b>{{obtenerTelefono()}}</p>
                                
                            <p><b>Motivo</b></p> 
                            <textarea v-model="reporte.Motivo" name="motivo" id="motivo" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí los motivos" v-validate="'required'"></textarea>
                            <span v-if="errors.motivo" class="error">{{errors.motivo}}</span> 

                            <p><b>Derivación</b></p>
                            <input v-model="reporte.Derivacion" type="text" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí a donde lo deriva">
                        </div>

                        <div>
                            <p><b>Descripción de la derivación</b></p> 
                            <textarea v-model="reporte.DescripcionDer" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí la descripción de la deribación"></textarea>
                        
                            <p><b>Observaciones</b></p>
                            <input v-model="reporte.Observaciones" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí las observaciones">
                    
                            <p><b>Seguimiento</b></p>
                            <input v-model="reporte.Seguimiento" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí el seguimiento que se dará">                        
                        </div>
                    </div>

                   
                   <div class="miGrid2 mt-2">
                       <div>
                            <p class="m-0"><b>Responsable de seguimiento</b></p> 
                            <select v-model="reporte.ResponsableSeguimiento" class="mdb-select md-form colorful-select dropdown-primary">
                                <option value="Salvador Alcazar Molina">Salvador Alcazar Molina</option>
                                <option value="Brenda Yaret">Brenda Yaret</option>
                                <option value="Cesar Gonzalez">Cesar Gonzalez</option>
                            </select>
                       </div>

                       <div>
                            <button @click="guardarReporte"  type="submit" class="mibtn btnGuardar positionSave">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                       </div>
                   </div>                   
                </div>  
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
                familiares: [],
                errors: []
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

               if (this.reporte.Status == undefined) {
                    alert('Seleccione el estatus de este reporte');
                    return;
                }
                
               if ( this.reporte.IdFamiliar == undefined 
                    || this.reporte.Derivacion == undefined || this.reporte.DescripcionDer == undefined
                    || this.reporte.Observaciones == undefined || this.reporte.Seguimiento == undefined ) {
                    alert('Verifique y llene todos los campos');
                    return;
                }

                axios.post('/yonoAbandono', this.reporte).then(res => {
                    this.reporte = res.data;
                    $('#reporteTuto').modal('hide');
                    // bus.$emit('incidenciaAgregada', res.data);
                }).catch(error => {
                    if (error.res.status == 422) {
                        this.errors = error.res.data.errors;
                    }
                });
            }
        }
    }
</script>

<style>
    .bordeReport{
        border: 1px solid #a5a5a5;
        border-radius: 4px;
        margin: 10px;
        padding: 5px;
        font-size: 14px;
    }

    .imageLogo{
        float: left;
        width: 120px;
        height: 40px;
        background: #a5a5a5;
    }

    .imageLogo img {
        width: 120px;
        height: 40px;
    }

    .btnGuardar{
        background: #800000;
        border-radius: 4px;
        color: white;
        outline: none;
        padding-left:5px;
        padding-right: 5px; 
        border: 1px solid #800000;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .btnGuardar:hover{
        background-color: rgb(255, 255, 255);
        color: rgb(167, 11, 11);
        border: 1px solid #800000;
    }

    .miGrid2{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .colorText {
        /* color: #414141; */
        color: #3d3d3d;
    }

</style>