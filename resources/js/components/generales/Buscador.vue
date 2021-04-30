<template>
    <div class="divbuscador">

        <form @submit.prevent="buscar">
            <input v-model="buscador" type="text" id="buscador" class="mibuscador" style="width:300px;" placeholder="Buscar por nombre o número de control" ref="buscador">
        </form>
    </div>
</template>

<script>
    import bus from '../../event-bus';
  
    export default {
        data() {
            return {
                alumno: {},
                buscador: ''
            }
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
            buscar() {
                if(!this.buscador){
                    const input = this.$refs.buscador;
                    this.buscador = input.value;
                }

                if(!this.buscador){
                    return;
                }
                console.log('buscando 2')
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
