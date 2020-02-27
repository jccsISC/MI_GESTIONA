<template>
<form @submit.prevent="guardarReporte">
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
                            <div>
                                <p class="m-0"><b>Padre: </b>{{familiar.NombrePadre}} {{familiar.ApePaternoPadre}}  {{familiar.ApeMaternoPadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoPadre}}</p>
                            </div>
                            <div>
                                <p class="m-0"><b>Madre: </b>{{familiar.NombreMadre}} {{familiar.ApePaternoMadre}}  {{familiar.ApeMaternoMadre}}</p>
                                <p class="m-0"><b>Telefóno: </b>{{familiar.TelefonoMadre}}</p><br>
                            </div>
                                
                            <b>Motivo</b> 
                            <textarea required v-model="reporte.Motivo" name="motivo" id="motivo" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí los motivos"></textarea>
                            <span v-if="errors.motivo" class="error">{{errors.motivo}}</span> 

                            <b>Derivación</b>
                            <input v-model="reporte.Derivacion" type="text" class="form-control w-75 p-1 mb-1" placeholder="Escriba aquí la institución externa a donde lo deriva">
                        </div>

                        <div>
                            <b>Descripción de la derivación</b>
                            <textarea v-model="reporte.DescripcionDer" name="" id="" class="form-control p-1 mb-1" placeholder="Escriba aquí la descripción de la deribación"></textarea><br>
                        
                            <b>Observaciones</b>
                            <input required v-model="reporte.Observaciones" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí las observaciones"><br>
                    
                            <b>Seguimiento</b>
                            <input v-model="reporte.Seguimiento" type="text" class="form-control p-1 mb-1" placeholder="Ingresa aquí el seguimiento que se dará">                        
                        </div>
                    </div>

                   
                   <div class="miGrid2 mt-2">
                       <div>
                            <p class="m-0"><b>Canalizar a </b></p> 
                            <select required v-model="reporte.user_id" class="mdb-select md-form colorful-select dropdown-primary">
                                <option v-for="(user, key) in users" :key="key" :value="user.id">{{user.name}}</option>
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
    </form>
</template>

<script>
    import bus from '../../event-bus';
    export default {
        props : ['userlogeado'],
         data() {
            return {
                alumno: {},
                reporte: {},
                familiar: {},
                tipo: '',
                errors: [],
                users: [],
                auth: {}
            }
        },
        created() {
            this.$parent.$on('generarReporte', alumno => {    
                this.reporte = {};          
                this.alumno = alumno;   
                this.auth = JSON.parse(this.userlogeado);
                this.reporte.Nombrequienderiva = this.auth.name;
                // this.reporte.Nombrequienderiva = 'Hardcoded';
                this.reporte.IdAlumno = alumno.IdAlumno; 
                this.jalarFamiliar();   
                this.jalarUsers();   
                // this.jalarCurrentUser();// return auth()->user();
            });

            // bus.$on('EditarMalaConducta', (incidencia, alumno) => {      
            //     console.log('consolelog'); 
            //     this.alumno = Object.assign({}, alumno);   
            //     this.incidencia = Object.assign({}, incidencia);
            //     this.jalarFamiliares();   
            //     this.tipo = 'Editar';
            // });
        },
        methods: {
            jalarFamiliar() {
                axios.get('alumnos/'+this.alumno.IdAlumno+'/familiar').then(res=>{
                    this.familiar = res.data;
                    this.reporte.IdFamiliar = this.familiar.IdFamiliar;
                });
            },
            guardarReporte() {
                if (this.reporte.Motivo == undefined
                    || this.reporte.Observaciones == undefined ) {
                    return;
                }
                
                if (this.reporte.Status == undefined) {
                    alert('Seleccione el estatus de este reporte');
                    return;
                }
                
                this.users.forEach(element => {
                    if (element.id == this.reporte.user_id) {
                        this.reporte.ResponsableSeguimiento = element.name;
                        return;
                    }
                });
                axios.post('/yonoAbandono', this.reporte).then(res => {
                    this.reporte = res.data;
                    $('#reporteTuto').modal('hide');
                    // bus.$emit('incidenciaAgregada', res.data);
                }).catch(error => {
                    if (error.res.status == 422) {
                        this.errors = error.res.data.errors;
                    }
                });
            },
            jalarUsers() {
                axios.get('/users').then(res => {
                    this.users = res.data;
                    console.log(res);
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

    .modal-body-g{
        height: 500px;
    }

</style>