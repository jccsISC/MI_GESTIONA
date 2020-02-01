<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" id="verUsuarios" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Usuarios</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: #800000">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body-g">
                        <table class="table table-striped table-hover contentTable table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <tr>
                                    <td colspan="7" class="text-center">Sin resultados...</td>
                                </tr>
                            </tbody>-->
                            <tbody>
                                <tr v-for="(usuario, keyusuario) in usuarios" :key="keyusuario">
                                    <td> {{ usuario.name }} </td>
                                    <td> {{ usuario.email }} </td>
                                    <td> {{ usuario.TipoUs }} </td>

                                    
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBeca" 
                                            @click="$emit('actualizarUsuario', usuario)">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <!--<a href="#" class="btn btn-primary"><i class="far fa-edit"></i></a>-->
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" @click="eliminarUsuario(usuario, keyusuario)"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addBeca"
                            @click="$emit('actualizarBeca', {})">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>     
                </div>
            </div>
        </div>

        <create-form-becas @becaActualizada="actualizarBeca($event)"></create-form-becas>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                usuarios: []
            }
        },
        created() {
            axios.get('/usuarios').then(res => {
                this.usuarios = res.data;
            });
        }
    }
</script>

<style>