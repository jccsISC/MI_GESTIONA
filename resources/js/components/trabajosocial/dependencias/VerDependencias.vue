<template>
    <div class="modal fade" tabindex="-1" role="dialog" id="verDepencencias" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Dependencias</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table class="table table-striped table-hover contentTable table table-sm">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Giro</th>
                                <th>Teléfono</th>
                                <th>Responsable</th>
                                <th>Tipo de Vinculación</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                            <tr>
                                <td colspan="7" class="text-center">Sin resultados...</td>
                            </tr>
                        </tbody>-->
                        <tbody>
                            <tr v-for="(dependencia,key) in dependencias" :key="key">
                                <td> {{ dependencia.Nombre }} </td>
                                <td> {{ dependencia.Direccion }} </td>
                                <td> {{ dependencia.Giro }} </td>
                                <td> {{ dependencia.Telefono }} </td>
                                <td> {{ dependencia.Responsable }} </td>
                                <td> {{ dependencia.TipoVinculacion }} </td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#modifyDepencencia"><i class="far fa-edit"></i></button>
                                    <!--<a href="#" class="btn btn-primary"><i class="far fa-edit"></i></a>-->
                                </td>
                                <td>
                                     <button class="btn btn-danger" @click="eliminarDependencia(dependencia, key)"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addDepencencia"><i class="fas fa-plus-circle"></i></button>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                dependencias: []
            }
        },
        created() {
            axios.get('/dependencias').then(res => {
                this.dependencias = res.data;
            });
        },
        methods: {
            
            

            eliminarDependencia(dependencia, key){
                //lo elimina en la base de datos
                axios.delete(`/dependencias/${key.id}`)
                .then(() => {
                    //lo elimina de manera visual
                    this.dependencias.splice(key,1);
                })
            }
        }
    }
</script>

<style>
   .contentTable th, td{
       font-size: 13px;
   }
 

</style>