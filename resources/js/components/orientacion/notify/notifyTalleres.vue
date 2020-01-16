<template>
    <div class="contenedorCard">
        <p class="subtitulos">Talleres</p>
        <div class="micardTalleres p-3 mr-3">        
            <div class="cardTaller izeTaller text-center" data-toggle="modal" data-target="#detalleTaller">
                <spinner v-show="loading"></spinner>
                <p class="pt-2 m-0"><b>Pediculosis</b></p>
                <p class="m-0">25-01-2020</p>
            </div>
            <div class="cardTaller izeTaller text-center ml-3" data-toggle="modal" data-target="#detalleTaller">
                <spinner v-show="loading"></spinner>
                <p class="pt-2 m-0"><b>Delitos</b></p>
                <p class="m-0">23-01-2020</p>
            </div>
            <div class="cardTaller izeTaller text-center ml-3" data-toggle="modal" data-target="#detalleTaller">
                <spinner v-show="loading"></spinner>
                <p class="pt-2 m-0"><b>Suicidios</b></p>
                <p class="m-0">23-01-2020</p>
            </div>
            <button class="btnaddTaller ml-3" data-toggle="modal" data-target="#detalleTaller">+</button>
        </div>
        <detalle-taller></detalle-taller>
    </div>
</template>

<script>
    import bus from '../../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true,
                fechaInicio: '',
                fechaFinal: '',
                semana:''
            }
        },
        created() {
            axios.get('/trabajosocial?tipo=justificantes').then(res => {
                this.alumnos = res.data.data;
                this.fechaInicio = res.data.fechas.Inicio;
                this.fechaFinal = res.data.fechas.Fin;
                this.semana = res.data.fechas.Semana;
                this.loading = false;
            });
        },
        methods: {

            seleccionarAlumno(alumno) {
                console.log('click');
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   
<style>

    .cardTaller{
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