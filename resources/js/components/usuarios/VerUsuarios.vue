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

                    <div class="modal-body-g" style="overflow-y: scroll;">
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
                                <tr v-for="(usuario, key) in usuarios" :key="key">
                                    <td> {{ usuario.name }} </td>
                                    <td> {{ usuario.email }} </td>
                                    <td> {{ usuario.name }}</td>
                                    

                                    
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addUsuario" 
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addUsuario"
                            @click="$emit('actualizarUsuario', {})">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>     
                </div>
            </div>
        </div>

        <create-form-usuarios @usuarioActualizado="actualizarUsuario($event)"></create-form-usuarios>
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
        },
         methods: {

              actualizarUsuario(usuario) {             
      
                if (usuario.esNueva) {
                    this.usuarios.push(usuario);
                } else {
                    const temp = Object.assign({}, this.usuarios);//clonamos el array usuarios
                    this.usuarios = []; //reiniciamos el array usuarios para que actualice al momento de guardar
                    Object.keys(temp).forEach(key => {
                        if (temp[key].id === usuario.id) {
                            this.usuarios[key] = usuario;
                        } else {
                            this.usuarios[key] = temp[key];
                        }
                    });
                }   
            },
              eliminarUsuario(usuario, key) {
                // Lo elimina en la base de datos.
                axios.delete(`/usuarios/${usuario.id}`)
                .then(res => {
                    // Lo elimina de manera visual.
                    this.usuarios.splice(key,1);
                })
             }
       }
    }
</script>

<style>