<template>
    <div class="container divPrin">

        <h4 class="text-center">Maestro: {{name}}</h4>
        <div class="midiv text-center">
           <div class="row">
               <div class="col-md-6">
                    <label class="float-left">Ciclo escolar</label>
                    <select class="custom-select" name="" id="">
                        <option value="">FEB - JUL</option>
                        <option value="">AGO - ENE</option>
                    </select>
               </div>
               <div class="col-md-6">
                    <label class="float-left">Fecha</label>
                    <input class="form-control" type="date"><br>
               </div>
           </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label>Parcial</label>
                    <select class="custom-select" name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="">Materia</label>
                    <select class="custom-select" name="" id="">
                        <option v-for="(materia, key) in horariosMaestro" :key="key" value=""> {{materia.Materia}} </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="panel-group p-0 m-0 mt-4" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default m-0">
                <div v-for="(materia, key) in horariosMaestro" :key="key" class="panel-heading m-0" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <button class="btnSelectAlumn" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" :aria-controls="'collapseOne' +key">
                           Grupo {{materia.Grupo}} {{materia.Grado}}
                        </button>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <table class="table table-striped table-hover contentTable table table-sm scrollIncidencias">
                            <thead>
                                <tr>
                                    <th colspan="5">Nombre del ALumno</th>
                                    <th>Faltas</th>
                                </tr>
                            </thead>
                                    
                            <tbody>
                                <tr v-for="(alumno, key) in alumnos" :key="key">
                                    <td colspan="5"> {{alumno.Nombre}} {{alumno.ApePaterno}} {{alumno.ApeMaterno}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm mr-3" style="color:white;"><i class="fas fa-plus"></i></button>
                                        <label> 1 </label>
                                        <button class="btn bg-danger btn-sm ml-3" style="color:white;"><i class="fas fa-minus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <div class="panel-group" id="sub-accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="subHeadingOne">
                                    <h4 class="panel-title">
                                        <button class="w-100" role="button" data-toggle="collapse" data-parent="#sub-accordion" href="#collapseSubOne" aria-expanded="true" aria-controls="collapseSubOne">
                                            Grupo 3 A
                                        </button>
                                    </h4>
                                </div>
                                <div id="collapseSubOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subHeadingOne">
                                    <div class="panel-body">
                                        
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import bus from '../../event-bus';
   
    export default {
        props : ['userlogeado'],
        data: () => ({
            alumnos: [],
            horariosMaestro: [],
            auth: {},
            loading: false,
            name: '',
            idMaestro: 0,  
        }),
        created() {
            // axios.get('/trabajosocial?tipo=justificantes').then(res => {
            //     this.alumnos = res.data.data;
            //     this.fechaInicio = res.data.fechas.Inicio;
            //     this.fechaFinal = res.data.fechas.Fin;
            //     this.semana = res.data.fechas.Semana;
            //     this.loading = false;
            // });

            this.auth = JSON.parse(this.userlogeado);
            this.name = this.auth.name;

            this.listMaterias();
            this.listAlumnos();

            axios.get('registrarFaltas').then(res => {
                 console.log(res.data);
            });
        },
        methods: {
            async listMaterias(id) {
                const {data} = await axios.get('horario');
                this.horariosMaestro = data;
                console.log(this.horariosMaestro);
            },
            async listAlumnos() {
                const {data} = await axios.get('alumno');
                this.alumnos = data;
                console.log(this.alumnos);
            },
            seleccionarAlumno(alumno) {
                console.log('click');
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   
<style>

    .midiv{
        width: 50%;
        margin-right: auto;
        margin-left: auto;
        border: 1px solid rgb(223, 223, 223);
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 10px;
    }
    
    .pbtn{
        position: fixed;
        right: 7%;
        bottom: 20%;
    }

    .carreraSelect {
        width: 100%;
        background: #800000;
        color: white;
        outline: none;
  
        border: 1px solid #800000;
        padding: 5px;
        margin: 0;
        transition: 0.4s;
        /* box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4); */
    }

    .carreraSelect:hover{
        background: white;
        color: #800000;
        border: 1px solid #800000;
        transition: 0.6s;
        /* box-shadow: 0 2px 4px 0 rgb(167, 11, 11); */
    }



</style>