<template>
    <div class="divbuscador">

        <form @submit.prevent="buscar">
            <!-- <img src="/images/loupe.png" alt="icon" class="miicosearch">-->
            <input v-model="buscador" type="text" id="buscador" class="mibuscador" style="width:300px;" placeholder="Buscar por nombre o número de control">
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
        methods:{
            buscar() {
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

<style>

</style>