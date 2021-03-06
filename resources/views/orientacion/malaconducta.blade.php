<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTE DE MALA CONDUCTA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <img class="imgLogo" src="images/logo.jpg" alt="">

    <div class="text-center mt-3 miFontSize">
        <p class="m-0">COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE JALISCO</p>
        <p class="m-0">PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</p>
        <p class="m-0" style="text-decoration: underline;">FORMATO YO NO ABANDONO</p>
        <p class="m-0">SEGUIMIENTO Y DERIVACION</p>
    </div>

    <p class="text-right mt-2 miFontSize"><b>Fecha: </b>{{$malaConducta->FechaInicio}}</p>
    
    <div class="contenedorRT mt-4 miFontSize">
        <label class="m-0"><b>Alumno: </b>{{$alumno->Nombre}} {{$alumno->ApePaterno}}  {{$alumno->ApeMaterno}}</label>
        <label class="ml-4 m-0"><b>Carrera: </b>{{$alumno->Carrera}}</label>
        <label class="m-0 ml-4"><b>Semestre: </b>{{$alumno->Grado}}</label>
        <label class="m-0 ml-4"><b>Grupo: </b>{{$alumno->Grupo}}</label>
        <label class="m-0 ml-4"><b>Telefono: </b>{{$alumno->Telefono}}</label> <br>
        
        <label class="m-0"><b>Nombre de quien deriva: </b>{{$malaConducta->ResponsableSeguimiento}}</label> <br>
        <label class="m-0"><b>Nombre del Papá: </b>{{$familiar->NombrePadre.' '.$familiar->ApePaternoPadre.' '.$familiar->ApeMaternoPadre}}</label>
        <label class="m-0 ml-4"><b>Telefono: </b>{{$familiar->TelefonoPadre}}</label> <br>
        <label class="m-0"><b>Nombre de la Mamá: </b>{{$familiar->NombreMadre.' '.$familiar->ApePaternoMadre.' '.$familiar->ApeMaternoMadre}}</label>
        <label class="m-0 ml-5"><b>Telefono: </b>{{$familiar->TelefonoMadre}}</label>
    </div>
    
    <div class="contenedorRT mt-4 miFontSize">
        <label class="minicontenedor"><b>Descripció del reporte: </b>{{$malaConducta->DescripcionReporte}}</label> <br>  
        <label class="minicontenedor"><b>Comentario de quien le da seguimiento: </b>{{$malaConducta->Comentarios}}</label> <br>
        <label class="minicontenedor"><b>Gravedad de la falta: </b>{{$malaConducta->TipoFalta}}</label> <br>
        <label class="minicontenedor"><b>Comentario del Padre o Tutor: </b>{{$malaConducta->ComentariosPa}}</label> <br>
        <label class="minicontenedor"><b>Observaciones: </b>{{$malaConducta->Observaciones}}</label><br>
        <label class="minicontenedor"><b>Derivación: </b>{{$malaConducta->Derivacion}}</label>
    </div>
    
    <div class="contenedorRT mt-4 miFontSize text-center">
        <p class="m-0">PSICOSOCIAL</p>
        <p class="m-0">PISC. CESAR RODRIGEUZ GARCIA</p>
        <p class="m-0">ORIENTACION EDUCATIVA</p>
        <p class="m-0">HABITOS DE ESTUDIO</p>
        <p class="m-0">TEMAS DE SALUD MENTAL Y FISICA</p>
        <p class="m-0">TEMAS FAMILIARES</p>
    </div>

    <div class="mb-5 miFontSize" style="margin-top: 7%;">
        <div class="float-left p-3 contentFirma">
            <!-- <hr class="miHr"> -->
            <label class="m-0">________________________</label>
            <p class="miI">Nombre y Firma quien deriva</p>
        </div>

        <div class="float-left p-3 contentFirma">
            <!-- <hr class="miHr"> -->
            <label class="m-0">________________________</label> <br>
            <label class="m-0">Nombre y Firma del encargado</label> <br>
            <label class="m-0">Yo No Abandono Seguimiento</label>
        </div>

        <div class="float-left p-3 contentFirma">
            <!-- <hr class="miHr"> -->
            <label class="m-0">________________________</label> <br>
            <label class="m-0">Nombre y Firma de quien da</label>
        </div>
    </div>
</body>
    <style>

        .miFontSize {
            font-size: 13px;
        }
        
        .imgLogo{
            width: 120px;
            height: 40px;
            background: #a5a5a5;
        }
        .contenedorRT {
            border: 1px solid #a5a5a5;
            border-radius: 3px;
            padding: 10px;
        }
    
        .minicontenedor {
            width: 100%;
            border: 1px solid #a5a5a5;
            border-radius: 3px;
            padding: 5px;
            margin: 3px;
        }

        .contentFirma {
            width: 220px;
        }

        
    </style>
</html>