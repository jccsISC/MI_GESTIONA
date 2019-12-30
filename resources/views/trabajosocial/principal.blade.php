@extends('layouts.base')
@section('title','Trabajo Social')

@section('content')
   <!--ventana info personal alumno-->
   <div class="ventanaAlumno" id="windowAlumno">
        <div class="cerrarventanaAlumno">
            <a href="javascript:cerrar()"><img src="/images/cancel.png" width="11" height="11"></a> 
        </div>

        
        <p class="subtitulos">Información Personal</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana">
        
        </div>

        <p class="subtitulos">Información Académica</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana2">
        
        </div>

        <p class="subtitulos">Inacistencias</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana">
        
        </div>

        <p class="subtitulos">Salud - Incidencias</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana2">
        
        </div>

        <p class="subtitulos">Trabajo Social</p>
        <hr class="barrasubtitulos">
        <div class="contenedorVentana">
        
        </div>
    </div>
   
   <!--contenedores con información seccionada-->
   <section class="contenedor-secciones">
       <!--card info personal-->
       <div class="contenedorCard">
            <p class="subtitulos">Información Personal</p>
            <div id="cardInfoPersonal" class="micard" onclick="abrir()">
               <div>
                   <label for=""><b>Matricula:</b></label>
                   
               </div>
           </div>
       </div>
       
        <!--card becas-->
        <div class="contenedorCard">
            <p class="subtitulos">Becas</p>
            <div id="cardInfoB" class="micardsm">
                <div >
                    <div id="cardInfoP" class="micardBeca">
                        <label for="tipoBeca"><b>Interna:</b></label>
                        <input type="text" id="Nombre" class="cbSinBordeB" />
                    </div>
                </div>

                <div >
                    <div id="cardInfoP" class="micardBeca">
                        <label for="tipoBeca"><b>Externa:</b></label>
                        <input type="text" id="Nombre" class="cbSinBordeB" />
                    </div>
                </div>
                
                <div >
                    <div id="cardInfoP" class="micardBeca">
                        <label for="tipoBeca"><b>Otro:</b></label>
                        <input type="text" id="Nombre" class="cbSinBordeB" />
                    </div>
                </div>
           </div>
       </div>

       <!--card praticas profesionales-->
       <div class="contenedorCard">
            <p class="subtitulos">Practicas Profesionales</p>
            <div id="cardInfoP" class="micardsm">
               <div class="contenedorPracticasServicio">
                    <label for="nombre"><b>Nombre del alumno:</b></label>
                    <input type="text" id="NombreAlumno" class="cbSinBordePS"/>
                    <label for="dependencia"><b>Dependencia:</b></label>
                    <input type="text" id="Dependencia" class="cbSinBordePS"/>
                    <label for="fInicio"><b>Fecha de inicio:</b></label>
                    <input type="text" id="FechaInicio" class="cbSinBordePS"/>
                    <label for="fFin"><b>Fecha de finalización:</b></label>
                    <input type="text" id="FechaFin" class="cbSinBordePS"/>
               </div>
           </div>
       </div>

       <!--card servicio social-->
       <div class="contenedorCard">
            <p class="subtitulos">Servicio Social</p>
            <div id="cardInfoP" class="micardsm">
            <div class="contenedorPracticasServicio">
                    <label for="nombre"><b>Nombre del alumno:</b></label>
                    <input type="text" id="NombreAlumno" class="cbSinBordePS"/>
                    <label for="dependencia"><b>Dependencia:</b></label>
                    <input type="text" id="Dependencia" class="cbSinBordePS"/>
                    <label for="fInicio"><b>Fecha de inicio:</b></label>
                    <input type="text" id="FechaInicio" class="cbSinBordePS"/>
                    <label for="fFin"><b>Fecha de finalización:</b></label>
                    <input type="text" id="FechaFin" class="cbSinBordePS"/>
               </div>
           </div>
       </div>

       <!--card justificantes y pases-->
       <div class="contenedorCard">
            <p class="subtitulos">Justificantes y Pases de salida</p>
            <div id="cardInfoP" class="micardsm">
               <div>

               </div>
           </div>
       </div>
   </section>

   <section class="contenedor-notify">
       <!--card info personal-->
       <div class="contenedorCard">
            <p class="subtitulos-small">16-09-2019 a 20-09-2019</p>
            <p class="subtitulos-small">Semana 3</p>
            <p class="subtitulos">Notificación de justificantes</p>
            <div id="cardInfoP" class="micardNotifications">
                <div class="contenedorNotJustificantes">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                <div class="contenedorNotJustificantes">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                <div class="contenedorNotJustificantes">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                <div class="contenedorNotJustificantes">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                
               
           </div>
       </div>
       
        <!--card reprobaciones-->
        <div class="contenedorCardReprobados">
            <p class="subtitulos">Notificación de Pases de Salida</p>
            <div id="cardInfoP" class="micardNotifications">
                <div class="contenedorNotReprobaciones">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                <div class="contenedorNotReprobaciones">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                <div class="contenedorNotReprobaciones">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
                <div class="contenedorNotReprobaciones">
                    <div id="cardInfoP" class="micardNotificaciones">

                    </div>
                </div>
           </div>
       </div>
   </section>


   <script>

        Drag.init (document.getElementById("windowAlumno"));

        function abrir(){
            document.getElementById("windowAlumno").style.display ="block";
            document.getElementById("cardInfoP").style.background = "rgb(211, 211, 211)";
        }

        function cerrar(){
            document.getElementById("windowAlumno").style.display = "none";
            document.getElementById("cardInfoP").style.background = "white";
        }

    </script>
@endsection