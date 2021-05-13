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
                    <hr class="mt-1 p-0">
  
                    <button class="btn btn-primary" data-toggle="modal" style="position: absolute; right: 16px; top:48px;" data-target="#addBeca"
                        @click="$emit('actualizarBeca', {})">
                        <i class="fas fa-plus-circle"> Agregar</i>
                    </button>

                    <div class="modal-body-g mt-4">
                        <table class="table table-striped table-hover contentTable table table-sm mt-3 table-bordered">
                            <thead style="background-color: #800000; color: white;">
                                <tr style="border: solid #800000;">
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr data-toggle="modal" data-target="#addBeca" @click="$emit('actualizarBeca', beca)" v-for="(beca, keybeca) in becas" :key="keybeca">
                                    <td> {{ beca.Nombre }} </td>
                                    <td> {{ beca.Tipo }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <create-form-becas @becaActualizada="actualizarBeca($event)" :onDelete="eliminarBeca"></create-form-becas>
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
            eliminarBeca(beca) {
                console.log('eliminar beca', beca);
                const confirmacion = confirm(`¿Está seguro que desea eliminar la beca ${beca.Nombre}?`);
                 // Lo elimina en la base de datos.
                if(confirmacion){
                    axios.delete(`/becas/${beca.IdBeca}`)
                    .then(() => {
                        // Lo elimina de manera visual.
                        const becas = [...this.becas];
                        const key = becas.findIndex(b => b.IdBeca === beca.IdBeca);
                        if (key >= 0) {
                            becas.splice(key,1);
                            this.$set(this, 'becas', [...becas])
                        }
                    })
                }
                
                // Lo elimina en la base de datos.
            //       if(confirmacion){
            //         axios.delete(`/becas/${beca.IdBeca}`)
            //         .then(res => {
            //             // Lo elimina de manera visual.
            //             this.becas.splice(key,1);
            //         })
            // }
        }
    }
}
</script>
