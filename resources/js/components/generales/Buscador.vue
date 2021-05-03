<template>
    <div class="divbuscador">
        <!-- <form @submit.prevent="buscar"> -->
            <input autocomplete="off" v-model="buscador" type="text" id="buscador" class="mibuscador" style="width:300px;" placeholder="Buscar por nombre o número de control" ref="buscador">
        <!-- </form> -->
        <ul v-if="mostrarOpciones">
            <li v-for="opcion in opciones" :key="opcion.id" @click="seleccionarOpcion(opcion)">
                {{ opcion.Nombre }}
            </li>
            <li v-if="!opciones || !opciones.length" key="noresults" @click="cancelarBusqueda()">
                No hay resultados
            </li>
        </ul>
    </div>
</template>

<script>
    import bus from '../../event-bus';
  
    export default {
        watch: {
            buscador: function(text) {
                this.debouncedGetAnswer();
            }
        },
        data() {
            return {
                alumno: {},
                buscador: '',
                opciones: [],
                mostrarOpciones: false,
                debouncedGetAnswer: null,
            }
        },
        created() {
            this.debouncedGetAnswer = _.debounce(this.buscarOpciones, 500)
        },
        mounted() {
            setTimeout(() => {
                const input = this.$refs.buscador;
                if (input && input.value) {
                    this.buscador = input.value;
                    this.buscar();
                }
            });
        },
        methods:{
            cancelarBusqueda() {
                this.mostrarOpciones = false;
            },
            buscarOpciones() {
                if (!this.buscador) {
                    this.cancelarBusqueda();
                    return;
                }
                axios.get('/alumnos/buscar?opciones=true&buscar='+this.buscador).then(res=>{
                    this.mostrarOpciones = true;
                    this.opciones = res.data;
                });
            },
            seleccionarOpcion(opcion) {
                this.mostrarOpciones = false;
                bus.$emit('alumnoSeleccionado', opcion);
            },
            buscar() {
                if(!this.buscador){
                    const input = this.$refs.buscador;
                    this.buscador = input.value;
                }

                if(!this.buscador){
                    return;
                }

                axios.get('/alumnos/buscar?buscar='+this.buscador).then(res=>{
                    if(res.data){
                        bus.$emit('alumnoSeleccionado', res.data)
                    }else{
                        console.log('Alumno no encontrado');
                    }
                });
            }
        }
    
    }
</script>

<style scoped>
    .divbuscador ul {
    display: flex;
    flex-direction: column;
    position: absolute;
    background: white;
    width: 300px;
    }
    .divbuscador li {
        margin: 0.2rem;
        padding: 0.5rem;
        cursor: pointer;
        color: #800000;
        border-radius: 5px;
    }
    .divbuscador li:hover {
        background: #d1d1d1;
        color: #800000;
    }
</style>