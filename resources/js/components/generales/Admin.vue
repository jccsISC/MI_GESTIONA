<template>
<div class="container contentGeneral">
    <div class="borderTitle">
        <h4>INFORMACIÓN PERSONAL</h4>
    </div>
    <div class="contentInf">
        <div v-if="alumno.IdAlumno" class="inforP">
            <div class="miImg">
                    <img src="images/student.png" alt="Foto del Alumno">
                </div>

                <div>
                    <p class="m-0"><b>Matricula: </b>{{alumno.IdAlumno}}</p>
                    <p class="m-0 miMaxLength"><b>Nombre: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                    <p class="m-0"><b>Carrera: </b>{{alumno.Carrera}}</p>
                    <p class="m-0"><b>Fecha Nacimiento: </b>{{alumno.FechaNacimiento}}</p>
                    <p class="m-0"><b>Género: </b>{{alumno.Sexo}}</p>
                </div>

                <div>
                    <p class="m-0"><b>{{alumno.Grado}} Semestre</b></p>
                    <p class="m-0"><b>Grupo: {{alumno.Grupo}}</b></p>
                </div>  
        </div>
    </div>

    <div class="borderTitle">
        <h4>INFORMACIÓN PERSONAL</h4>
    </div>
    <div class="contentInf">
        
    </div>

    <div class="borderTitle">
        <h4>INFORMACIÓN PERSONAL</h4>
    </div>
    <div class="contentInf">
        
    </div>

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
                alumno: {}
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                
                this.alumno = alumno;
               
            });
        },
        computed:{
            dataTarget(){
                return this.alumno.IdAlumno ? '#allinfo' : '';
            }
        }
    
    }
</script>
   
<style>

  
    .contentGeneral{
        width: 100%; 
        height: 620px;
        background: rgba(247, 247, 247, 0.418);
        border: 2px solid rgb(223, 223, 223);
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 15px;
        margin-top: 80px;
        overflow: scroll;
        overflow: auto;
    }

    .contentGeneral::-webkit-scrollbar{
        width: 3px;
    }

    .contentGeneral::-webkit-scrollbar-thumb{
        width: 3px;
        background: #800000;
    }

    
    .contentInf{
        width: 100%;
        height: 300px;
        background: white;
        border: 1px solid rgb(223, 223, 223);
        border-radius: 3px;
        /* box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.4); */
        padding: 10px;
        margin: 0;
        margin-bottom: 15px;
    }

    .inforP{
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
    }
    
    .borderTitle{
        width: 100%;
        height: 30px;
        border: 1px solid rgb(223, 223, 223);
        border-radius: 3px;
        text-align: center;
        font-size: 14px;
        margin-bottom: 3px;
        color: #800000;
    }
</style>