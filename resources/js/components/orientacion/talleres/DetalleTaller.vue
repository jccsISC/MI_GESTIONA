<template>

  <div class="modal fade" id="detalleTaller" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-body-xl">
           <p>Fecha: <input type="date" class="form-control w-50 p-0" v-model="taller.Fecha"></p>
           <p>Hora del Curso: <input type="time" class="form-control w-50 p-0" v-model="taller.Hora"></p>
            <div class="form-group">
	    		<label>Nombre del Taller:</label>
		    	<input type="text" class="form-control p-0" placeholder="Ingresa el nombre del taller" v-model="taller.Nombre">
		  	</div>
            <div class="form-group p-0">
	    		<label>Institución:</label>
		    	<input type="text" class="form-control p-0" placeholder="Ingresa el nombre del taller"  v-model="taller.Institucion">
		  	</div>
            
        <div>

          <table>
            <thead>
              <tr>
                <th>
                  Dirigido a:
                </th>
                <th>
                  Semestre:
                </th>
                <th>
                  No Beneficiados:
                </th>
                <th>
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(grupo, key) in grupos" :key="key">
                <td>
                   <select class="form-control m-0 p-0" v-model="grupo.Grupo">
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
                    <select class="form-control m-0 p-0" v-model="grupo.Semestre">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                  </select>
                </td>

                <td>
                  <input type="number" class="form-control p-0" placeholder="Cantidad" v-model="grupo.Cantidad">
                </td>
                <td>
                  <button @click="eliminarGrupo(grupo, key)" class="btn btn-danger">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
          <button @click="agregarGrupo" class="btn btn-primary">Agregar Grupo</button>
		  	</div>
            
        <div class="form-group p-0">

          <label>Nombre del responsable:</label>
          <input type="text" class="form-control p-0" placeholder="Nombre del que imparte el curso" v-model="taller.Responsable">

		  	</div>
        <button @click="guardar" type="button" class="miBtn float-right mb-2" v-if="!taller.IdTaller">Guardar</button>
         <button @click="actualizarTaller()" class="btn btn-info" v-if="taller.IdTaller">Actualizar</button>
        <button @click="eliminarTaller()" class="btn btn-danger" v-if="taller.IdTaller">Eliminar</button>
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

</style>