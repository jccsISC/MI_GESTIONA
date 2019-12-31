<template>
  <div class="modal fade" id="addBeca" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Becas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--detenemos el submit y lo manejamos conforme lo ocupemos, prevenimos que se envie y lo mandamos al metodo saveBeca-->
      	  <form @submit.prevent="saveBeca">
	          <div class="form-group">
			        <label>Nombre</label>
			        <input type="text" class="form-control" placeholder="Ingresa el nombre de la beca" v-model="name">
		  	    </div>
		  	    <div class="form-group">
			        <label>Tipo de beca</label>
			        <input type="text" class="form-control" placeholder="Ingresa el tipo de la beca" v-model="tipo">
		  	    </div>
                <div class="form-group">
			        <label>Programa Perteneciente</label>
			        <input type="text" class="form-control" placeholder="Ingresa el programa al que pertenece" v-model="programa">
		  	    </div>

		  	    <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>

    //importamos nuestro even-bus
   // import EventBus from '../../event-bus';

    export default {
      //definimos los atributos que utilizaremos
      data(){
        return{
          name: null,
          tipo: null,
          programa: null
        }
      }/*,
      methods:{ //especificamos la seccion de metodos dentro de vue
        //definimos el metodo que le dimos al formulario
        savePokemon: function(){
          //creamos una variable para establecer la ruta actual en la que estamos
          let currentRoute = window.location.pathname
          //console.log(currentRoute)

         //de esta manera enviamos la informacion cambiamos las comillas para hacer interpolaciond e cadenas
         axios.post(`http://127.0.0.1:8000${currentRoute}/pokemons`,{
            name: this.name,
            picture: this.picture,
            description: this.description
          })
          .then(function(res){
            console.log(res)
            //console.log(res.data.pokemon)//nos mostrara la respuesta de ese pokemon creado con la llave que creamos
            //le damos un hide a nuestro modal
            $('#addPokemon').modal('hide')
            //le especificamos que queremos emitir un evento
            EventBus.$emit('pokemon-added',res.data.pokemon)//con esto generamos un evento con informacion
          })
          .catch(function(err){
            console.log(err)
          });
        }
      }*/
    }
</script>

<style>
    
</style>