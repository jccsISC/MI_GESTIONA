<template>
    <div class="contenedorCard">
        <p class="subtitulos">Historial de talleres tomados</p>
        <div class="historialTalleres colorText">
            <spinner v-show="loading"></spinner>
            <table class="table table-striped table-hover contentTable table  scrollTalleres table-sm">
                <thead>
                    <tr style="text-align: center;">
                        <th>Grupos</th>
                        <th colspan="2">Taller</th>
                        <th>Beneficiarios</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
            
                <tbody>
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
    .historialTalleres{
        width: 100%;
        height: 280px;
        background-color: white;
        box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.4);
        border-radius: 8px;
        transition: 0.5s;
        border: 1px solid rgb(211, 211, 211);
    }
    .scrollTalleres tbody,
    .scrollTalleres thead { 
        display: block;     
    }

    .scrollTalleres thead tr th { 
        width: 5%;
        height: 20px;
        line-height: 20px;
        /* background: #800000; */
        /* color: white; */
    }

    .scrollTalleres tbody tr td { 
        width: 10%;
        height: 20px;
        line-height: 20px;
    }

    .scrollTalleres tbody {
        max-height: 250px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .scrollTalleres tbody::-webkit-scrollbar {
        width: 1px;
    }

    .scrollTalleres tbody::-webkit-scrollbar-thumb{
        width: 1px;
        background: #800000;
    }
</style>