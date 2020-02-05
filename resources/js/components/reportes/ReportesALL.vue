<template>
<div class="container divPrin">

    <div id="accordion">
        <div v-for="(alumno, key) in alumnos" :key="key">
            <div class="card-header" :id="'heading'+ key">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" :data-target="'#collapse'+ key" aria-expanded="false" :aria-controls="'collapse'+ key">
                        {{alumno.Nombre}} {{alumno.ApePaterno}} {{alumno.ApeMaterno}}
                    </button>
                </h5>
            </div>
            <div :id="'collapse'+ key" :class="['collapse', alumno.IdAlumno == idalumno ? 'show' : '' ]" :aria-labelledby="'heading'+ key" data-parent="#accordion">
                <table class="table table-striped table-hover contentTable table table-sm">
                    <thead>
                        <tr>
                            <th colspan="3">Tipo</th>
                            <th colspan="4">Responsable</th>
                            <th colspan="3">Status</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr data-toggle="modal" :data-target="incidencia.TipoReporte == 'Incidencia' ? '#verIncidencias' : '#verMalaConducta'" v-for="(incidencia, key2) in alumno.incidencias" :key="key2" @click="$emit('verIncidencia', incidencia, alumno)">
                            <td colspan="3">
                                {{incidencia.TipoReporte}}
                            </td>
                            <td colspan="4">{{incidencia.ResponsableSeguimiento}}</td>
                            <td colspan="3"><label class="">{{incidencia.Status ? 'Concluido' : incidencia.Status === 0 ? 'Pendiente' : ''}}</label></td>
                        </tr>
                    </tbody>
                 </table>

                 <table class="table table-striped table-hover contentTable table table-sm">
                    <thead>
                        <tr >
                            <th colspan="3">Tipo</th>
                            <th colspan="4">Motivo</th>
                            <th colspan="3">Status</th>
                            <th colspan="3">Seguimiento</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr data-toggle="modal" data-target="#verReporte" v-for="(reporte, key3) in alumno.reportes" :key="key3" @click="$emit('verReporte', reporte, alumno)">
                            <td colspan="3">
                                Yo no Abandono
                            </td>
                            <td colspan="4">{{reporte.Motivo}}</td>
                            <td colspan="3"><label class="">{{reporte.Status ? 'Concluido' : 'Pendiente'}}</label></td>
                            <td colspan="4">{{reporte.Seguimiento}}</td>
                        </tr>
                    </tbody>
                 </table>
           </div>
        </div>
    </div>
   <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

    <ver-incidencias></ver-incidencias>
    <ver-mala-conducta></ver-mala-conducta>
    <ver-yonoAbandono></ver-yonoAbandono>
</div>
</template>

<script>
    import bus from '../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true,
                idalumno : ''
            }
        },
        created() {

            bus.$on('alumnoSeleccionado', alumno => {
                this.idalumno = alumno.IdAlumno;
            });
            
            bus.$on('incidenciaEditada', incidencia => {
                this.alumnos.forEach((alumno, index) => {
                    const temp = Object.assign({}, alumno.incidencias);
                    this.alumnos[index].incidencias = [];
                    Object.keys(temp).forEach(key => {
                        if (temp[key].IdIncidencia === incidencia.IdIncidencia) {
                            this.alumnos[index].incidencias[key] = incidencia;
                        }
                        else {
                            this.alumnos[index].incidencias[key] = temp[key];
                        }
                    });
                });
            });

            this.idalumno = new URLSearchParams(window.location.search).get('show');
            console.log(this.idalumno);

            axios.get('/incidencias').then(res => {
                this.alumnos = res.data;

                this.loading = false;
            });
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

    .midiv p{
        font-size: 15px;
    }

    .divPrin{
        width: 80%; 
        height: 650px;
        border: 2px solid rgb(223, 223, 223);
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 15px;
        margin-top: 80px;
    }
    
    .pbtn{
        float:right;
    }

    .posibuscador{
        margin-left: 28%;
    }

        
    .buscadorR{
        border-radius: 4px;
        border: 1px solid rgb(146, 140, 140);
        text-align: center;
        padding: 1px;
        font-size: 12px;
        outline: none;/*eliminar el resplandor al foco del input*/
    }

    .buscadorR:focus{
        border-color: dodgerblue;
        box-shadow: 0 0 8px 0 dodgerblue;
    }

    .concluido{
        border-radius: 3px;
        background: rgb(27, 192, 27);
        padding: 4px;
    } 
</style>