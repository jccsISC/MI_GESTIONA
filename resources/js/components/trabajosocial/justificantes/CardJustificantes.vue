<template>
    <div class="contenedorCard">
        <p class="subtitulos">Justificantes y Pases de Salida</p>
        <div class="micardsm" data-toggle="modal" data-target="#addPracticas">
            <div class="contenedorPracticasServicio">
               <div>
                <p class="m-sm-1"><b>Justificantes</b></p>
                <label><b>Días: </b></label>
                <button class="btn btn-danger btn-sm mr-1 p-0 pr-1 pl-1" 
                    v-for="(justificante, keyjustificantepase) in justificantes.slice().reverse()" :key="keyjustificantepase"  
                    data-toggle="modal" data-target="#addJustificantes" @click="$emit('verJustificante', justificante)">
                    
                    {{keyjustificantepase + 1}}

                </button>
               </div>
               
              <div>
                <p class="m-0"><b>Pases de Salida</b></p>
                <label><b>Días: </b></label>
                <button class="btn btn-danger btn-sm mr-1 p-0 pr-1 pl-1" 
                    @click="$emit('verPase', pase)" v-for="(pase, keyjustificantepase2) in pases.slice().reverse()" 
                    :key="keyjustificantepase2" data-toggle="modal" data-target="#addJustificantes">
                
                    {{keyjustificantepase2+1}}
                
                </button>


                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addJustificantes" @click="$emit('agregarJustificante', alumno)">
                    <i class="fas fa-plus-circle"></i>
                </button>

              </div>
              

            </div>

        </div>
        
        <add-justificante
         @paseGuardado="pases.push($event)" 
         @justificanteGuardado="justificantes.push($event)"
         @justificanteEliminado="justificanteEliminado($event)"
         @paseEliminado="paseEliminado($event)"
         >
         </add-justificante>
        
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
        },
        methods: {
            justificanteEliminado(id){
                let posicion = -1;
                this.justificantes.forEach((justificante,key) => {
                    if(justificante.IdJustificante === id){
                        posicion = key;
                        return;
                    }
                });
                console.log(posicion);
                console.log(this.justificantes);
                this.justificantes.splice(posicion,1);
                console.log(this.justificantes);
            },
            paseEliminado(id){
                 let posicion = -1;
                this.pases.forEach((pase,key) => {
                    if(pase.IdPaseSal === id){
                        posicion = key;
                        return;
                    }
                });
                console.log(posicion);
                console.log(this.pases);
                this.pases.splice(posicion,1);
                console.log(this.pases);
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

</style>