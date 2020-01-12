<template>
    <div class="contenedorCard">
        <p class="subtitulos">Información Personal</p>
        <div id="cardInfoPersonal" class="micard" onclick="abrir()">
            <div v-if="alumno.IdAlumno" id="miContent" class="miContent">
                <div class="miImg">
                    <!--<img src="images/student.png" alt="Foto del Alumno">-->
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
            
            <div v-if="alumno.IdAlumno" id="miContent2" class=" mt-4 miContent2">

                <div>
                    <p class="m-0"><b>Telefóno: </b>{{alumno.Telefono}}</p>
                    <p class="m-0"><b>Correo: </b>{{alumno.EMAIL}}</p><br>
                    <p class="m-0 small "><b>Domicilio</b></p>
                    <P class="m-0"><b>Colonia: </b>{{alumno.Colonia}}</P>
                    <P class="m-0"><b>Calle: </b>{{alumno.Calle}} #{{alumno.NumExterior}}</P>
                    <p class="m-0 miMaxLength2"><b>Lugar De Nacimiento: </b>{{alumno.MunicipioNac}} {{alumno.EstadoNac}}</p>
                </div>

                <div class="vl"></div>

                <div>
                    <p class="m-0 pl-4"><b>Tipo de Sangre: </b>{{alumno.TipoSangre}}</p>
                    <p class="m-0 pl-4"><b>Etnia: </b>{{alumno.Etnia}}</p>
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

    .miImg{
        width: 90px;
        height: 90px;
        border-radius: 8px;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
        margin-left: 5px;
        float: left;
    }
    img{
        width: 100%;
    }

    .miContent{
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
    }

    .miMaxLength{
        width: 220px;
        text-overflow: ellipsis;
        white-space:nowrap;
        overflow: hidden;
    }

    .miContent2{
        display: grid;
        grid-template-columns: 14fr 1fr 10fr;
        /*grid-template-rows: 130px;*/
    }

    .miMaxLength2{
        width: 245px;
        text-overflow: ellipsis;
        white-space:nowrap;
        overflow: hidden;
    }

    .vl {
        margin-top: 10px;
        margin: auto;
        border-left: 1px solid rgb(196, 199, 196);
        height: 80px;
    }
</style>