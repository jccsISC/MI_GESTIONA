<template>
   
<div class="modal fade" id="allinfo" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-centered modal-lg modal-dialog-scrollable"  role="document">
            <div class="modal-content">
                <div >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
			<div class="modal-body-g2">
				<p class="subtitulos">Información Personal</p>
                <hr class="barrasubtitulos">
                <div class="contenedorVentana">
                    <card-info-personal-general></card-info-personal-general>
                </div>

                <p class="subtitulos text-center">Información Académica</p>
                <hr class="barrasubtitulos">
                <div class="contenedorVentana2">
                    <cal-general></cal-general>
                </div>

                <p class="subtitulos text-center">Inacistencias</p>
                <hr class="barrasubtitulos">
                <div class="contenedorVentana">
                
                </div>

                <p class="subtitulos text-center">Salud - Incidencias</p>
                <hr class="barrasubtitulos">
                <div class="contenedorVentana2">
                
                </div>

                <p class="subtitulos text-center">Trabajo Social</p>
                <hr class="barrasubtitulos">
                <div class="contenedorVentana">
                
                </div>
			</div>
		</div>
	</div>

</div>
   
</template>

<script>

</script>

<style>
 .subtitulos{
       text-align: center;
   }

</style>