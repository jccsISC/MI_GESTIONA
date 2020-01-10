<template>
    <div class="contenedorCard">
        <p class="subtitulos">Información Personal</p>
        <div id="cardInfoPersonal" class="micard" onclick="abrir()">
            <div>
                <label for=""><b>Matricula:</b>{{alumno.IdAlumno}}</label>
                <label for=""><b>Carrera:</b>{{alumno.Carrera}}</label>
                <label for=""><b>Fecha Nacimiento:</b>{{alumno.FechaNacimiento}}</label>
                <label for=""><b>Genero:</b>{{alumno.Sexo}}</label>
                <label for=""><b>Lugar De Nacimiento:</b>{{alumno.MunicipioNac}}</label>
                <label for=""><b>Domicilio:</b>{{alumno.Calle}} - {{alumno.NumExterior}}</label>
                <label for=""><b>Tipo de Sangre:</b>{{alumno.TipoSangre}}</label>
                <label for=""><b>Etnia:</b>{{alumno.Etnia}}</label>
                   
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

</style>