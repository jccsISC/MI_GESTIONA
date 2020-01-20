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
            <div :id="'collapse'+ key" class="collapse" :aria-labelledby="'heading'+ key" data-parent="#accordion">
                <table class="table table-striped table-hover contentTable table table-sm">
                    <thead>
                        <tr>
                            <th colspan="3">Tipo</th>
                            <th colspan="4">Falta</th>
                            <th colspan="3">Status</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr data-toggle="modal" data-target="#verIncidencias" v-for="(incidencia, key2) in alumno.incidencias" :key="key2" @click="$emit('verIncidencia', incidencia, alumno)">
                            <td colspan="3">
                                Incidencia
                            </td>
                            <td colspan="4">{{incidencia.TipoFalta}}</td>
                            <td colspan="3"><label class="concluido">{{incidencia.Status ? 'Concluido' : 'Pendiente'}}</label></td>
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
                            <td colspan="3"><label class="concluido">{{reporte.Status ? 'Concluido' : 'Pendiente'}}</label></td>
                            <td colspan="4">{{reporte.Seguimiento}}</td>
                        </tr>
                    </tbody>
                 </table>
           </div>
        </div>
    </div>
    <ver-incidencias></ver-incidencias>
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
            }
        },
        created() {
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
        width: 100%; 
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