<template>
<div class="container divPrin">

    <div class="midiv">
        <div class="posibuscador">

        <form @submit.prevent="buscar">
            <!-- <img src="/images/loupe.png" alt="icon" class="miicosearch">-->
            <input v-model="buscador" type="text" id="buscador" class="buscadorR" style="width:225px;" placeholder="Buscar por nombre o No. control">
        </form>
    </div>
    </div>

    <table class="table table-striped table-hover contentTable table table-sm">
                    <thead>
                        <tr>
                            <th colspan="3">Tipo</th>
                            <th colspan="3">Nombre</th>
                            <th colspan="3">Status</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr>
                            <td colspan="3">
                                Yo no abandono
                            </td>
                            <td colspan="3">Julio Cesar Camacho Silva</td>
                            <td colspan="3">concluido</td>
                        </tr>
                        
                           <tr>
                            <td colspan="3">
                                Incidencias
                            </td>
                            <td colspan="3">Julio Cesar Camacho Silva</td>
                            <td colspan="3">concluido</td>
                        </tr>

                           <tr>
                            
                            <td colspan="3">
                                Incidencias
                            </td>
                            <td colspan="3">Julio Cesar Camacho Silva</td>
                            <td colspan="3">concluido</td>
                        </tr>

                           <tr>
                           
                            <td colspan="3">
                                Mal Comportamiento
                            </td>
                            <td colspan="3">Julio Cesar Camacho Silva</td>
                            <td colspan="3">concluido</td>
                        </tr>

                           <tr>

                            <td colspan="3">
                                Yo no abandono
                            </td>
                            <td colspan="3">Julio Cesar Camacho Silva</td>
                            <td colspan="3">concluido</td>
                        </tr>

                           <tr>
                            
                            <td colspan="3">
                                Yo no abandono
                            </td>
                            <td colspan="3">Julio Cesar Camacho Silva</td>
                            <td colspan="3">concluido</td>
                        </tr>
                         

                    </tbody>
                 </table>
</div>
</template>

<script>
    import bus from '../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true,
                fechaInicio: '',
                fechaFinal: '',
                semana:''
            }
        },
        created() {
            axios.get('/trabajosocial?tipo=justificantes').then(res => {
                this.alumnos = res.data.data;
                this.fechaInicio = res.data.fechas.Inicio;
                this.fechaFinal = res.data.fechas.Fin;
                this.semana = res.data.fechas.Semana;
                this.loading = false;
            });
        },
        methods: {

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
</style>