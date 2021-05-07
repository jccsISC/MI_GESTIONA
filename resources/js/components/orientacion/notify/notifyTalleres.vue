<template>
    <div class="contenedorCard">
        <p class="subtitulos">Talleres</p>
        <div class="micardTalleres p-3 colorText">        
            <div v-for="(taller, key) in talleres" :key="key" class="cardTaller izeTaller text-center ml-4 mb-3" data-toggle="modal" data-target="#detalleTaller" @click="$emit('editarTaller', taller, key)">
                <spinner v-show="loading"></spinner>
                <p class="pt-2 m-0"><b>{{taller.Nombre}}</b></p>
                <p class="m-0">{{taller.Fecha}}</p>
            </div>

            <button class="btnaddTaller ml-4" data-toggle="modal" data-target="#detalleTaller" @click="$emit('agregarTaller')">+</button>
        </div>

        <detalle-taller 
            @tallerAgregado="tallerAgregado($event)" 
            @tallerEliminado="tallerEliminado($event)" 
            @tallerActualizado="tallerActualizado($event)">
            
        </detalle-taller>
    </div>
</template>

<script>
    import bus from '../../../event-bus';

    export default {
        data() {
            return {
                talleres: [],
                loading: true
            }
        },
        created() {
            axios.get('/talleres').then(res => {
                this.talleres = res.data;
                this.loading = false;
            });
        },
        methods: {
            tallerActualizado(taller) {
                bus.$emit('actulizarListaGrupos');
                const t = Object.assign({}, taller);
                const temp = [...this.talleres];
                this.talleres = [];
                temp.forEach((registro, index) => {
                    if (index == t.key) {
                        this.talleres[index] = t;
                    } else {
                        this.talleres[index] = registro;
                    }
                });
            },
            tallerAgregado(taller) {
                this.talleres.push(taller);
                bus.$emit('actulizarListaGrupos');
            },
            tallerEliminado(taller) {
                bus.$emit('actulizarListaGrupos');
                this.talleres.splice(taller, 1);
            }
        }
    }
</script>
   
<style>

  

    .cardTaller{
        background-color: white;
        width: 140px;
        height: 100px;
        padding: 5px;
        float: left;
        box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.4);
        border-radius: 3px;
    }

    .cardTaller:hover{
        /*box-shadow: 0 5px 12px 0 rgba(0,0,0,0.2);*/
        box-shadow: 0 2px 4px 0 rgb(167, 11, 11);
    }

    .micardTalleres{
        width: 100%;
        height: 280px;
        background-color: white;
        box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.4);
        border-radius: 8px;
        transition: 0.5s;
        border: 1px solid rgb(211, 211, 211);
    }


    .micardTalleres{
        overflow: scroll;
        overflow: auto;
    }

    .micardTalleres::-webkit-scrollbar{
        width: 1px;
    }
/* 
    .scrollT::-webkit-scrollbar-thumb{
        background: #800000;
        width: 1px;
    } */

    .btnaddTaller{
        width: 140px;
        height: 100px;
        background: white;
        float: left;
        box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.4);
        border-radius: 3px;
        outline: none;
        border: 1px solid white;
    }

    .btnaddTaller:hover{
        /*box-shadow: 0 5px 12px 0 rgba(0,0,0,0.2);*/
        box-shadow: 0 2px 4px 0 rgb(167, 11, 11);
    }

    .izeTaller{
        font-size: 12px;
    }



</style>