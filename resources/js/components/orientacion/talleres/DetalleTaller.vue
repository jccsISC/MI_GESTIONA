<template>
  <div class="modal fade" id="detalleTaller" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div>
            <div class="float-left" style="margin-left: 38%; margin-right: 30%;">
              <p class="subtitulos text-center">Editar taller</p>
            </div>

            <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close">
              <span style="color: #800000">&times;</span>
            </button>
        </div>

        <hr class="mt-1">

        <div class="modal-body-xl colorText">
          <div class="form-row m-2">
            <div class="form-group col-md-6">
              <label>Fecha:</label>
              <input type="date" class="form-control" v-model="taller.Fecha">
            </div>
            <div class="form-group col-md-6">
              <label>Hora del curso:</label>
              <input type="time" class="form-control" v-model="taller.Hora">
            </div>
            <div class="form-group col-md-6">
              <label>Nombre del taller:</label>
              <input type="text" class="form-control" placeholder="Ingresa el nombre del taller" v-model="taller.Nombre">
            </div>
            <div class="form-group col-md-6">
              <label>Institución:</label>
              <input type="text" class="form-control" placeholder="Ingresa el nombre de la Institución" v-model="taller.Institucion">
            </div>
          </div>
          
          <table class="table table-striped table-hover table-sm">
            <thead style="background-color: rgb(128, 0, 0); border: solid rgb(128, 0, 0); color: white;">
              <tr style="text-align: center;">
                <th colspan="2">
                  Dirigido a:
                </th>
                <th>
                  Semestre:
                </th>
                <th colspan="2">
                  No. beneficiados:
                </th>
                <th>
                  Acciones
                </th>
              </tr>
            </thead>
            
            <tbody>
              <tr style="text-align: center;" v-for="(grupo, key) in grupos" :key="key">
                <td colspan="2">
                  <!-- Example single danger button -->
                    <select class="custom-select" v-model="grupo.Grupo" style="width: 50px">
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
                    <select class="custom-select text-center" style="width: 50px" v-model="grupo.Semestre">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                  </select>
                </td>

                <td colspan="2">
                  <center><input type="number" min="0" class="form-control" placeholder="0" v-model="grupo.Cantidad" style="width: 50px"></center>
                </td>
                <td>
                  <button @click="eliminarGrupo(grupo, key)" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
          <button @click="agregarGrupo" class="btn btn-primary p-0 pl-1 pr-1 float-right"><i class="fas fa-plus-circle"></i> Agregar</button>
              
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
  $("#fecha").datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'mm/dd/yyyy',
    startDate: new Date(),
    endDate: new Date(new Date().setDate(new Date().getDate() + 5))
})
</script>

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
               || this.taller.Responsable == undefined) {
                  alert('Verifique y llene todos los campos');
                  return;
          }

  

          for (let grupo of this.grupos) {
            if (grupo.Grupo == undefined || grupo.Semestre == undefined || grupo.Cantidad == undefined) {
              alert('el julio se la come riendo a carcajadas');
              return;
            }
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
          const confirmacion = confirm(`¿Está seguro que desea eliminar el taller?`);
     if(confirmacion){
          axios.delete('/talleres/'+this.taller.IdTaller).then(res => {   
            this.$emit('tallerEliminado', this.key);
            $('#detalleTaller').modal('hide');
          })};
     
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