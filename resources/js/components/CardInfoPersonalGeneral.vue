<template>
    <div class="contenedorCard1">
        <div id="cardInfoPersonalGeneral" class="micard1">
            <div v-if="alumno.IdAlumno" class="miContent1">
                <div class="miImg1">
                    <!--<img src="images/student.png" alt="Foto del Alumno">-->
                </div>

                <div class="uno">
                    <p><b>Matricula: </b>{{alumno.IdAlumno}}</p>
                    <p><b>Nombre: </b>{{alumno.Nombre}} {{alumno.ApePaterno}}  {{alumno.ApeMaterno}}</p>
                    <p><b>Fecha Nacimiento: </b>{{alumno.FechaNacimiento}}</p>
                    <p><b>Sexo: </b>{{alumno.Sexo}}</p>
                    <p><b>Telefóno: </b>{{alumno.Telefono}}</p>
                </div>

                <div class="dos">
                    <p><b>Correo: </b>{{alumno.EMAIL}}</p>
                    <p><b>Carrera: </b>{{alumno.Carrera}}</p>
                    <p><b>Grado: </b>{{alumno.Grado}}</p>
                    <p><b>Grupo: </b>{{alumno.Grupo}}</p>
                    <p><b>Turno: </b>{{alumno.Turno}}</p>
                </div>

                <div class="tres">
                    <p class=""><b>INFORMACIÓN DE PADRES O TUTOR</b></p>
                    <div class="padres">
                        <div class="mama">
                            <p><b>MAMÁ</b></p>
                        </div>
                        <div class="papa">
                            <p><b>PAPÁ</b></p>
                        </div>
                    </div>
                    
                </div>

                <div class="cuatro">
                    <p class=""><b>LUGAR DE NACIMIENTO</b></p>
                        <div class="lugarN">
                        
      
                        </div>
                </div>

                <div class="cinco">
                    <p class=""><b>GENERALES</b></p>
                        <div class="generales">
                        
      
                        </div>
                               
                </div>

                <div class="seis">
                    <p class=""><b>DOMICILIO</b></p>
                        <div class="domicilio">
                        
      
                        </div>     
                </div>
            </div>

        </div>
    </div>
</template>

<script>
   
    import bus from '../event-bus';
    
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
        }
    
    }
</script>

<style>
    p{
        margin: 0em;
    }

    .miImg1{
        width: 100px;
        height: 120px;
        border-radius: 8px;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
        margin-left: 5px;
        float: left;
    }
    img{
        width: 100%;
    }

    .miContent1{
        display: grid;
        padding: 8px;
        grid-template-columns:110px 1fr 1fr 2fr ;
        grid-template-rows:3fr 1fr 2fr;
        grid-gap: 10px;
        height: 260px;
    }

    .uno{
        background: #07A9B1;
        font-size: .75em;
    }

    .dos{
        background: #FF5733;
        font-size: .75em;
    }

    .tres{
        background: #07B134;
        font-size: .75em;
        text-align: center;
    }

    .padres{
        display: grid;
        grid-template-columns:1fr 1fr;
        background: #07B134;
        font-size: .75em;
        grid-gap: 10px;
       
    }

    .mama{
        background: rgb(177, 7, 7);
        font-size: 1.2em; 
        
    }

    .papa{
        background: rgb(101, 99, 134);
        font-size: 1.2em;
        
    }

    .cuatro{
        grid-column: 1 / 4;
        background: #A407B1;
        font-size: .75em;
    }

    .cinco{
        
        background: #07A9B1;
        font-size: .75em;
    }
    
     .seis{
        background: rgb(112, 177, 7);
        font-size: .75em;
    }
    
</style>