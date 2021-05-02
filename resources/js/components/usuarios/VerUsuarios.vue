<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" id="verUsuarios" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div>
                        <div class="float-left" style="margin-left: 43%;">
                            <p class="subtitulos text-center">Usuarios</p>
                        </div>
                        
                        <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                            <span style="color: #800000">&times;</span>
                        </button>
                    </div>
                    
                    <div class="mt-3">
                        <input v-model="buscador" type="text" style="width:180px;" placeholder="Buscar" class="form-control  mb-1 ml-3">
                        <button class="btn btn-primary" style="position:absolute; right:20px; top:48px;" data-toggle="modal" data-target="#addUsuario"
                            @click="$emit('actualizarUsuario', {})">
                            <i class="fas fa-plus-circle"> Agregar</i>
                        </button>
                    </div>
                    <hr class="mt-1 m-0 p-0">
                    <div class="modal-body-g">
                        <table class="table table-striped table-hover contentTable table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(usuario, key) in filterUsers" :key="key" @click="$emit('modificarUsuario', usuario)" data-toggle="modal" data-target="#ModUsuario">
                                    <td> {{ usuario.name }} </td>
                                    <td> {{ usuario.email }} </td>
                                    <td> {{ usuario.role_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>

        <create-form-usuarios @usuarioActualizado="actualizarUsuario($event)"></create-form-usuarios>
        <edit-form-usuarios @usuarioActualizado="modificarUsuario($event)" :onDelete="eliminarUsuario" ></edit-form-usuarios>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                usuarios: [],
                buscador: ''
            }
        },
        created() {
            axios.get('/usuarios').then(res => {
                this.usuarios = res.data.map(user => {
                    this.addRole(user);
                    return user;
                });

                console.log(this.usuarios);
            });
        },
        computed: {
            orderedUsers() {
                return this.usuarios.sort((a, b) => {
                    if (a.name > b.name) {
                        return 1;
                    }
                    if (a.name < b.name) {
                        return -1;
                    }
                    return 0;
                });
            },
            filterUsers() {
                if (!this.buscador) {
                    return this.orderedUsers;
                }
                return this.orderedUsers.filter(user => 
                    user.name.toLowerCase().includes(this.buscador.toLowerCase()) || 
                    String(user.id).toLowerCase().includes(this.buscador.toLowerCase())
                )
            },
        },
         methods: {
             addRole(usuario) {
                if (usuario.roles && usuario.roles.length && usuario.roles[0]) {
                    usuario.role = usuario.roles[0].id;
                    usuario.role_name = usuario.roles[0].name;
                }
             },
              actualizarUsuario(usuario) {             
      
                if (usuario.esNueva) {
                    this.addRole(usuario);
                    this.usuarios.push(usuario);
                }  

            },

            modificarUsuario(usuario){
                this.addRole(usuario);
                const temp = Object.assign({}, this.usuarios);//clonamos el array usuarios
                    this.usuarios = []; //reiniciamos el array usuarios para que actualice al momento de guardar
                    Object.keys(temp).forEach(key => {
                        if (temp[key].id=== usuario.id) {
                            this.usuarios[key] = usuario;
                        } else {
                            this.usuarios[key] = temp[key];
                        }
                    });
            },
              eliminarUsuario(usuario) {
                  const confirmacion = confirm(`¿Está seguro que desea eliminar el usuario ${usuario.name} ?`);

                // Lo elimina en la base de datos.
                if(confirmacion){
                axios.delete(`/usuarios/${usuario.id}`)
                .then(() => {
                    // Lo elimina de manera visual.
                    const users = [...this.usuarios];
                    const key = users.findIndex(user => user.id === usuario.id);
                    if (key >= 0) {
                        users.splice(key,1);
                        this.$set(this, 'usuarios', [...users])
                    }
                })
                }
             },

            buscar() {
                if(!this.buscador){
                    return;
                }
                axios.get('/usuarios/buscar?buscar='+this.buscador).then(res=>{
                    if(res.data){
                        bus.$emit('usuario seleccionado', res.data)
                    }else{
                        console.log('Usuario no encontrado');
                    }
                });
            }
       }
    }
</script>