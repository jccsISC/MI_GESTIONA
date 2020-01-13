<template>
    <div class="contenedorCard">
        <p class="subtitulos">Faltas por Asignatura</p>
        <div class="micard" onclick="abrir()">
            <table class="table table-striped table-hover contentTable table table-sm">
                        <thead>
                            <tr>
                                <th>Asignaturas</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <!--<tbody>
                            <tr>
                                <td colspan="7" class="text-center">Sin resultados...</td>
                            </tr>
                        </tbody>-->
                        <tbody>
                            <tr>
                                <td>Matemáticas</td>
                                <td>12-01-2020</td>
                                <button type="date" class="btn btn-sm bg-danger"><i class="far fa-calendar-alt"></i></button>
                            </tr>
                        
                        </tbody>
                    </table>
        </div>
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
            
        }
    
    }
</script>

<style>

</style>