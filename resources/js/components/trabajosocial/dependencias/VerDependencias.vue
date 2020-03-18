<template>
<div>
<div class="modal fade" tabindex="-1" role="dialog" id="verDepencencias" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div>
                    <div class="float-left pl-2" style="margin-left: 26%; margin-right: 20%;">
                        <p class="subtitulos  text-center">Lista de todas las dependencias disponibles</p>
                    </div>
                    
                    <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                        <span style="color: #800000">&times;</span>
                    </button>
                </div>

                <hr class="mt-1">

                <div class="modal-body-g">
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
                            <tr v-for="(dependencia,keydependencia) in dependencias" :key="keydependencia">
                                <td> {{ dependencia.Nombre }} </td>
                                <td> {{ dependencia.Direccion }} </td>
                                <td> {{ dependencia.Giro }} </td>
                                <td> {{ dependencia.Telefono }} </td>
                                <td> {{ dependencia.Responsable }} </td>
                                <td> {{ dependencia.TipoVinculacion }} </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addDepencencia" 
                                        @click="$emit('actualizarDependencia', dependencia)">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </td>
                                <td>
                                     <button class="btn btn-danger btn-sm" @click="eliminarDependencia(dependencia, keydependencia)"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <button class="btn btn-primary positionSave" data-toggle="modal" data-target="#addDepencencia"
                    @click="$emit('actualizarDependencia', {})">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </div>
    </div>

    <crear-dependencia @dependenciaActualizada="actualizarDependencia($event)"></crear-dependencia>
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
            actualizarDependencia(dependencia) {               
                if (dependencia.esNuevo) {
                    this.dependencias.push(dependencia);
                } else {
                    const temp = Object.assign({}, this.dependencias);//clonamos el array dependencas
                    this.dependencias = []; //reiniciamos el array beca para que actualice al momento de guardar
                    Object.keys(temp).forEach(key => {
                        if (temp[key].IdDependencia === dependencia.IdDependencia) {
                            this.dependencias[key] = dependencia;
                        } else {
                            this.dependencias[key] = temp[key];
                        }
                    });
                }
                
            },
            eliminarDependencia(dependencia, key) {
                const confirmacion = confirm(`¿Está seguro que desea eliminar la dependencia ${dependencia.Nombre}?`);
                // Lo elimina en la base de datos.
                if(confirmacion){
                axios.delete(`/dependencias/${dependencia.IdDependencia}`)
                .then(res => {
                    // Lo elimina de manera visual.
                    this.dependencias.splice(key,1);
                })
            }
        }
        }
    }
</script>

<style>
   .contentTable th, td{
       font-size: 13px;
   }
 

</style>