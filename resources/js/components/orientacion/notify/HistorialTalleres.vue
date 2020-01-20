<template>
    <div class="contenedorCard">
        <p class="subtitulos">Historial de talleres tomados</p>
            <div class="micardTalleres">
                <spinner v-show="loading"></spinner>
                <table class="table table-striped table-hover contentTable table table-sm">
                    <thead>
                        <tr>
                            <th>Grupos</th>
                            <th colspan="2">Taller</th>
                            <th>Beneficiarios</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr v-for="(grupo, key) in grupos" :key="key">
                            <td style="background: #800000; color:white; text-align: center;">{{grupo.Semestre}} {{grupo.Grupo}}</td>
                            <td colspan="2">{{grupo.taller.Nombre}}</td>
                            <td>{{grupo.Cantidad}}</td>
                            <td>{{grupo.taller.Fecha}}</td>
                            <td>{{grupo.taller.Hora}}</td>
                        </tr>
                    </tbody>
                 </table>
            </div>            
</div>

</template>

<script>
    import bus from '../../../event-bus';

    export default {
        data() {
            return {
                grupos: [],
                loading: true
            }
        },
        created() {
            bus.$on('actulizarListaGrupos', () => {
                this.actualizarLista();
            });
           this.actualizarLista();
        },
        methods: {
            actualizarLista() {
                axios.get('/talleres/grupos').then(res => {
                this.grupos = res.data;
                this.loading = false;
            }); 
            }
        }
    }
</script>
   
<style>

</style>