<template>
  <div class="modal fade" id="detalleTaller" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
              <p class="subtitulos text-center">Editar Taller</p>
            </div>

            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
              <span style="color: #800000">&times;</span>
            </button>
          </div>

          <hr class="mt-1">

        <div class="modal-body-xl colorText">
          <label><b>Fecha: </b><input type="date" class="p-0 " v-model="taller.Fecha"></label>
          <label class="ml-5"><b>Hora del Curso: </b><input type="time" class="p-0" v-model="taller.Hora"></label>
          
          <div>
            <label><b>Nombre del Taller:</b></label>
            <input type="text" class="p-0 pl-1" style="width:69%;" placeholder="Ingresa el nombre del taller" v-model="taller.Nombre">
          </div>
          
          <div>
            <label class="mt-2"><b>Institución</b>:</label>
            <input type="text" class="p-0 pl-1" style="width:81%;" placeholder="Ingresa el nombre del taller"  v-model="taller.Institucion">
          </div>
              
          <div class="borderTable">
            <table class="table table-striped table-hover contentTable table table-sm">
              <thead>
                <tr style="text-align: center;">
                  <th colspan="2">
                    Dirigido a:
                  </th>
                  <th>
                    Semestre:
                  </th>
                  <th colspan="2">
                    No Beneficiados:
                  </th>
                  <th>
                    Acciones
                  </th>
                </tr>
              </thead>
              
              <tbody>
                <tr style="text-align: center;" v-for="(grupo, key) in grupos" :key="key">
                  <td colspan="2">
                      <select class="p-0" v-model="grupo.Grupo">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                      </select>
                  </td>

                  <td>
                      <select class="p-0" v-model="grupo.Semestre">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                  </td>

                  <td colspan="2">
                    <input type="number" min="0" class="p-0  pl-1 w-25" placeholder="0" v-model="grupo.Cantidad">
                  </td>
                  <td>
                    <button @click="eliminarGrupo(grupo, key)" class="btn btn-danger btn-sm p-0 pr-xl-1 pl-xl-1"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <button @click="agregarGrupo" class="btn btn-primary p-0 pl-1 pr-1 float-right"><i class="fas fa-plus-circle"></i></button>
              
          <div>
            <label><b>Nombre del responsable:</b></label>
            <input type="text" class="form-control m-0 p-0 pl-1" placeholder="Nombre del que imparte el curso" v-model="taller.Responsable">
          </div>

          <button @click="guardar" type="button" class="miBtn float-right mt-2" v-if="!taller.IdTaller"><i class="far fa-save"></i> Guardar</button>
          <button @click="actualizarTaller()" class="btn btn-info  float-right p-0 pl-2 pr-2 mt-2" v-if="taller.IdTaller"><i class="far fa-save"></i> Actualizar</button>
          <button @click="eliminarTaller()" class="btn btn-danger float-left p-0 pl-2 pr-2 mt-2" v-if="taller.IdTaller"><i class="far fa-trash-alt"></i> Eliminar</button>
        </div>
      </div>
    </div>
  </div>      
</template>

<script>
    export default {
      created() {
        this.$parent.$on('agregarTaller', () => {
          this.grupos = [{}];
          this.taller = {};
          this.eliminar = [];
        });

        this.$parent.$on('editarTaller', (taller, key) => {
          console.log(taller);
          this.taller = Object.assign({}, taller);
          this.grupos = this.taller.grupos;
          this.eliminar = [];
          this.key = key;
        });
      },
      data() {
        return {
          grupos: [{}],
          taller: {},
          eliminar: [],
          key: ''
        }
      },
      methods: {
        agregarGrupo() {
          this.grupos.push({});
        },
        guardar() {
           if (this.taller.Fecha == undefined || this.taller.Hora == undefined 
              || this.taller.Nombre == undefined || this.taller.Institucion == undefined
              || this.grupo.Grupo == undefined || this.grupo.Semestre == undefined
              || this.grupo.Cantidad == undefined || this.taller.Responsable == undefined) {
                  alert('Verifique y llene todos los campos');
                  return;
          }

          this.taller.grupos = this.grupos;
          axios.post('/talleres', this.taller).then(res => {
            this.$emit('tallerAgregado', res.data);
            $('#detalleTaller').modal('hide');
          });
        },
        eliminarGrupo(grupo, key) {
          if (grupo.IdDetTaller) {
            this.eliminar.push(grupo.IdDetTaller);
          }

          this.grupos.splice(key, 1);
        },
        eliminarTaller() {
          axios.delete('/talleres/'+this.taller.IdTaller).then(res => {   
            this.$emit('tallerEliminado', this.key);
            $('#detalleTaller').modal('hide');
          });
        },
        actualizarTaller() {
          this.taller.eliminados = this.eliminar;
          this.taller.grupos = this.grupos;
          axios.put('/talleres/'+this.taller.IdTaller, this.taller).then(res => {   
            res.data.key = this.key;
            console.log(res.data);
            this.$emit('tallerActualizado', res.data);
            $('#detalleTaller').modal('hide');
          });
        }
      }
    }
</script>


<style>
  .modal-body-xl::-webkit-scrollbar{
      width: 0px;
  }

  .modal-body-xl{
      height: 400px;
      overflow-y: auto;
      padding-left: 10px;
      padding-right: 10px;
    }

  .borderTable {
      padding: 3px;
      height: 180px;
      border: 1px solid #a0a0a0;
      border-radius: 3px;
      overflow: auto;
  }

  .borderTable::-webkit-scrollbar{
      width: 1px;
  }

  .borderTable::-webkit-scrollbar-thumb{
      width: 1px;
      background: #800000;
  }
  

  /* .mibtn{
        background: #800000;
        border-radius: 4px;
        color: white;
        outline: none;
        padding-left:5px;
        padding-right: 5px; 
        border: 1px solid #800000;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    }

    .miBtn:hover{
        background-color: rgb(255, 255, 255);
        color: rgb(167, 11, 11);
        border: 1px solid #800000;
    } */

</style>