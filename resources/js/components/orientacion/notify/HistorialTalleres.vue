<template>
    <div class="contenedorCard">
        <p class="subtitulos">Historial de talleres tomados</p>
        <div class="micardTalleres colorText">
            <spinner v-show="loading"></spinner>
            <table class="table table-striped table-hover contentTable table table-sm">
                <thead>
                    <tr style="text-align: center;">
                        <th>Grupos</th>
                        <th colspan="2">Taller</th>
                        <th>Beneficiarios</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
            
                <tbody class="scrollTable">
                    <tr v-for="(grupo, key) in grupos" :key="key" style="text-align: center;">
                        <td style="background: #800000; color:white;">{{grupo.Semestre}} {{grupo.Grupo}}</td>
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