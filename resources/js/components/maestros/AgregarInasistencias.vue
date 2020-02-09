<template>
    <div class="container divPrin">

        <div class="midiv">
            <label>Seleccione la materia</label>
            <select name="" id="">
                <option value="">Matemáticas</option>
                <option value="">Informática</option>
                <option value="">Ecuaciones Diferenciales</option>
                <option value="">Calculo integral</option>
            </select>
        </div>

        <table class="table table-striped table-hover contentTable table table-sm">
            <thead>
                <tr>
                    <th>Grupos</th>
                    <th>Unidad</th>
                    <th colspan="2">Nombre del ALumno</th>
                    <th>Inasistencias</th>
                    <th>Día</th>
                </tr>
            </thead>
                    
            <tbody>
                <tr>
                    <td style="background: #800000; color:white; text-align: center;">3 A</td>
                    <td>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </td>
                    <td colspan="2">Julio Cesar Camacho Silva</td>
                    <td><input type="number" step="0.0" min="0"></td>
                    <td><input type="date"></td>
                </tr>
                
                <tr>
                    <td style="background: #800000; color:white; text-align: center;">3 C</td>
                    <td>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </td>
                    <td colspan="2">Julio Cesar Camacho Silva</td>
                    <td><input type="number" step="0.0" min="0"></td>
                    <td><input type="date"></td>
                </tr>

                <tr>
                    <td style="background: #800000; color:white; text-align: center;">2 K</td>
                    <td>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </td>
                    <td colspan="2">Julio Cesar Camacho Silva</td>
                    <td><input type="number" step="0.0" min="0"></td>
                    <td><input type="date"></td>
                </tr>

                <tr>
                    <td style="background: #800000; color:white; text-align: center;">1 K</td>
                    <td>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </td>
                    <td colspan="2">Julio Cesar Camacho Silva</td>
                    <td><input type="number" step="0.0" min="0"></td>
                    <td><input type="date"></td>
                </tr>

                <tr>
                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                    <td>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </td>
                    <td colspan="2">Julio Cesar Camacho Silva</td>
                    <td><input type="number" step="0.0" min="0"></td>
                    <td><input type="date"></td>
                </tr>
            </tbody>
        </table>
        
        <button type="button" class="miBtn pbtn">
            <i class="far fa-save"></i> Guardar
        </button>
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
                semana:'',
                
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
</style>