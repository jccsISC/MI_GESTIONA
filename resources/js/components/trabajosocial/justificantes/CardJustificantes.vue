<template>
    <div class="contenedorCard">
        <p class="subtitulos">Justificantes y pases de salida</p>
        <div class="micardsm colorText">
            <div v-if="alumno.IdAlumno" class="contenedorPracticasServicio">
                <button type="button" class="btn btn-primary btn-sm mr-2 mt-2 float-right" data-toggle="modal" data-target="#addJustificantes" @click="agregarJustificante(alumno)">
                    <i class="fas fa-plus-circle"></i>
                </button>
               
               <div>
                   <p class="m-0 mt-1"><b>Justificantes</b></p>
                   <div class="scrollHTS">
                       <button class="btn btn-danger btn-sm mr-1 p-0 pr-2 pl-2" 
                            v-for="(justificante, keyjustificantepase) in justificantes.slice().reverse()" :key="keyjustificantepase"  
                            data-toggle="modal" data-target="#addJustificantes" @click="mostrarJustificante(justificante)">
                            
                            {{keyjustificantepase + 1}}

                        </button>
                   </div>
               </div>
               
              <div>
                <p class="m-0"><b>Pases de salida</b></p>
                <div class="scrollHTS">
                    <button class="btn btn-danger btn-sm  mr-1 p-0 pr-2 pl-2" 
                        @click="mostrarPase(pase)" v-for="(pase, keyjustificantepase2) in pases.slice().reverse()" 
                        :key="keyjustificantepase2" data-toggle="modal" data-target="#addJustificantes">
                    
                        {{keyjustificantepase2+1}}
                    
                    </button>
                </div>
              </div>
            </div>
        </div>
        
        <add-justificante></add-justificante>
        
    </div>
</template>

<script> 
    import bus from '../../../event-bus';
    export default {
        data() {
            return {
                alumno: {},
                justificantes: [],
                pases: [],
                contador:0
            }
        },
        created() {
            bus.$on('alumnoSeleccionado', alumno => {
                 if(this.alumno.IdAlumno != alumno.IdAlumno){
                    this.alumno = alumno;
                    this.jalarJustificantes();
                    this.jalarPases();
                 }
            });

            bus.$on('justificanteGuardado', justificante => {
                this.justificantes.push(justificante);
            });

            bus.$on('paseGuardado', pase => {
                 this.pases.push(pase);
            });

            bus.$on('justificanteEliminado', id => {
               let posicion = -1;
                this.justificantes.forEach((justificante,key) => {
                    if(justificante.IdJustificante === id){
                        posicion = key;
                        return;
                    }
                });
                this.justificantes.splice(posicion, 1);
            });

            bus.$on('paseEliminado', id => {
                let posicion = -1;
                this.pases.forEach((pase,key) => {
                    if(pase.IdPaseSal === id){
                        posicion = key;
                        return;
                    }
                });
                this.pases.splice(posicion, 1);
            });
        },
        methods: {
            agregarJustificante(alumno) {
                bus.$emit('agregarJustificante', alumno);
            },
            mostrarJustificante(justificante) {
                bus.$emit('verJustificante', justificante);
            },
            mostrarPase(pase) {
                bus.$emit('verPase', pase);
            },
            jalarPases() {
                axios.get('/trabajosocial/' + this.alumno.IdAlumno + '/pases').then(res => {
                    this.pases = res.data;
                    console.log(res.data);
                });
            },
            jalarJustificantes() {
                axios.get('/trabajosocial/' + this.alumno.IdAlumno + '/justificantes').then(res => {
                    this.justificantes = res.data;
                    console.log(res.data);
                });
            }
        }
    }
</script>

<style>
    .scrollHTS{
        width: 80%;
        background: rgba(247, 247, 247, 0.418);
        /* border: 2px solid rgb(202, 201, 201); */
        /* border-radius: 3px; */
        margin-left: 10px;
        overflow-x: auto;
        /* overflow-x: scroll; */
        white-space: nowrap;
        margin: 0;
        padding: 0;
    }

    .scrollHTS::-webkit-scrollbar{
        width: 1px;
        height: 3px;
    }

    .scrollHTS::-webkit-scrollbar-thumb{
        width: 3px;
        background: #800000;
    }
</style>