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

                <button class="btn btn-primary" style="position: absolute; right: 16px; top:48px;" data-toggle="modal" data-target="#addDepencencia"
                    @click="$emit('actualizarDependencia', {})">
                    <i class="fas fa-plus-circle"> Agregar</i>
                </button>

                <div class="modal-body-g mt-5">
                    <table class="table table-striped table-hover contentTable table table-sm table-bordered">
                        <thead style="background-color: #800000; color: white;">
                            <tr style="border: solid #800000;">
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Giro</th>
                                <th>Teléfono</th>
                                <th>Responsable</th>
                                <th>Tipo de vinculación</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(dependencia,keydependencia) in dependencias" :key="keydependencia" data-toggle="modal" data-target="#addDepencencia" 
                                        @click="$emit('actualizarDependencia', dependencia)">
                                <td> {{ dependencia.Nombre }} </td>
                                <td> {{ dependencia.Direccion }} </td>
                                <td> {{ dependencia.Giro }} </td>
                                <td> {{ dependencia.Telefono }} </td>
                                <td> {{ dependencia.Responsable }} </td>
                                <td> {{ dependencia.TipoVinculacion }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
          
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