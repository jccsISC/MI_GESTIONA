<template>
<div>
    <div class="contenedorCard">
        <p class="subtitulos">Becas</p>
        <div class="micardB">
            <div v-for="(beca, key) in becas" :key="key" class="micardBeca" @click="$emit('actualizarBeca', beca)">
                <label><b>{{beca.Tipo}}</b> {{beca.Nombre}}</label>
                <button class="btn btn-danger btn-sm float-md-right" @click="eliminarBecaAlumno(beca, key)"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
    </div>

    <div v-if="alumno.IdAlumno" class="col centrar">
        <button type="button" class="top-space d-block mx-auto" data-toggle="modal" data-target="#DetalleBeca"
            @click="$emit('agregarBecaAlumno', alumno)">
            <i class="fas fa-plus-circle"></i>
        </button>
        
        <detalleBeca @becaAlumnoAgregada="becas.push($event)"></detalleBeca>     
    </div>

    <modal-beca></modal-beca>
</div>

</template>

<script>
    import bus from '../../../event-bus';
    export default {
        data() {
            return {
                becas: [],
                alumno: {},
            
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                this.alumno = alumno;
                this.jalarBecas();
            });
        },
        methods: {
            jalarBecas() {
                axios.get('/trabajosocial/'+this.alumno.IdAlumno+'/becas').then(res => {
                    this.becas = res.data;
                    console.log(res);
                });
            },
            actualizarBeca(becaActualizada) {
                const temp = Object.assign({}, this.becas);//clonamos el array becas
                this.becas = []; //reiniciamos el array beca para que actualice al momento de guardar
                Object.keys(temp).forEach(key => {
                    if (temp[key].IdBeca === becaActualizada.IdBeca) {
                        this.becas[key] = becaActualizada;
                    }
                    else {
                        this.becas[key] = temp[key];
                    }
                });
            },
            eliminarBecaAlumno(beca, key) {
                // Lo elimina en la base de datos.
                axios.delete('/trabajosocial/'+this.alumno.IdAlumno+'/becas/' + beca.IdBeca)
                .then(res => {
                    // Lo elimina de manera visual.
                    this.becas.splice(key,1);
                   
                })
            }
        }
    }
</script>

<style>
        .top-space{
            margin-top: 20px;
        }

        .micardB{
            width: 100%;
            height: 100px;
            background-color: rgb(255, 255, 255);
            box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.4);
            border-radius: 8px;
            transition: 0.5s;
            border: 1px solid rgb(211, 211, 211);
        }

        .micardBeca{
            width: 95%;
            height: 25px;
            background-color: white;
           /* box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.4);*/
            border-radius: 3px;
            transition: 0.5s;
            border: 1px solid rgb(211, 211, 211);
            margin-top: 5px;
            margin-left: 3%;
            text-align: left;
            text-indent: 5px ;  
            font-size: .75em;       
        }


        /* .micardBeca:hover{
            /*box-shadow: 1px 5px 10px  rgba(0,0,0,0.2);
            box-shadow: 0 2px 4px 0 rgb(167, 11, 11)
        } */

</style>