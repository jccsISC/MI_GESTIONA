<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" id="verBecas" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div>
                        <div class="float-left pl-2" style="margin-left: 20%; ">
                            <p class="subtitulos">Lista de todas las becas disponibles</p>
                        </div>
                        
                        <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
                            <span style="color: #800000">&times;</span>
                        </button>
                    </div>

                    <hr class="mt-1">

                    <div class="modal-body-g">
                        <table class="table table-striped table-hover contentTable table table-sm">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Nombre</th>
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
                                <tr v-for="(beca, keybeca) in becas" :key="keybeca" style="text-align: center;">
                                    <td> {{ beca.Nombre }} </td>
                                    <td> {{ beca.Tipo }} </td>
                                    
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBeca" 
                                            @click="$emit('actualizarBeca', beca)">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <!--<a href="#" class="btn btn-primary"><i class="far fa-edit"></i></a>-->
                                    </td>
                                    <td colspan="2">
                                        <button class="btn btn-danger btn-sm" @click="eliminarBeca(beca, keybeca)"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <button class="btn btn-primary positionSave" data-toggle="modal" data-target="#addBeca"
                        @click="$emit('actualizarBeca', {})">
                        <i class="fas fa-plus-circle"></i>
                    </button>
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
                becas: []
            }
        },
        created() {
            axios.get('/becas').then(res => {
                this.becas = res.data;
            });
        },
        methods: {
            actualizarBeca(beca) {               
                if (beca.esNueva) {
                    this.becas.push(beca);
                } else {
                    const temp = Object.assign({}, this.becas);//clonamos el array becas
                    this.becas = []; //reiniciamos el array beca para que actualice al momento de guardar
                    Object.keys(temp).forEach(key => {
                        if (temp[key].IdBeca === beca.IdBeca) {
                            this.becas[key] = beca;
                        } else {
                            this.becas[key] = temp[key];
                        }
                    });
                }   
            },
            eliminarBeca(beca, key) {
                const confirmacion = confirm(`¿Está seguro que desea eliminar la beca ${beca.Nombre}`?);
                // Lo elimina en la base de datos.
                  if(confirmacion){
                axios.delete(`/becas/${beca.IdBeca}`)
                .then(res => {
                    // Lo elimina de manera visual.
                    this.becas.splice(key,1);
                })
            }
        }
         }
    }
</script>
