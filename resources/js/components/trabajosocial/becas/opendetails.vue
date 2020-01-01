<template>
<div>
    <div class="contenedorCard">
        <p class="subtitulos">Becas</p>
        <div id="cardInfoB" class="micardsm">
            <div v-for="(beca, key) in becas" :key="key" class="micardBeca" data-toggle="modal" data-target="#addBeca" @click="$emit('actualizarBeca', beca)">
                <label><b>{{key === 0 ? 'Interna:' : key === 1 ? 'Externa:' : 'Otro:'}}</b> {{beca.Nombre}}</label>
            </div>
        </div>
    </div>

    <create-form-becas @becaActualizada="actualizarBeca($event)"></create-form-becas>
</div>

</template>

<script>
    export default {
        mounted() {
            axios.get('/becas').then(res => {
                this.becas = res.data;
            });
        },
        data() {
            return {
                becas: []
            }
        },
        methods: {
            actualizarBeca(becaActualizada) {
                const temp = Object.assign({}, this.becas);
                this.becas = []; 
                Object.keys(temp).forEach(key => {
                    if (temp[key].IdBeca === becaActualizada.IdBeca) {
                        this.becas[key] = becaActualizada;
                    }
                    else {
                        this.becas[key] = temp[key];
                    }
                });
            }
        }
    }
</script>

<style>
    .top-space{
        margin-top: 20px;
    }

        .micardBeca{
            width: 95%;
            height: 25px;
            background-color: white;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.4);
            border-radius: 3px;
            transition: 0.5s;
            border: 1px solid rgb(211, 211, 211);
            margin-top: 5px;
            margin-left: 3%;
            text-align: left;
            text-indent: 5px ;  
            font-size: .75em;       
        }


        .micardBeca:hover{
            /*box-shadow: 1px 5px 10px  rgba(0,0,0,0.2);*/
            box-shadow: 0 2px 4px 0 rgb(167, 11, 11)
        }
   

</style>