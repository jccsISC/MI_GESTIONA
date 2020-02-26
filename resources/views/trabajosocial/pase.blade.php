<HTML>
   <HEAD>
      <TITLE>PASE DE SALIDA</TITLE>
   </HEAD>
   <BODY>
       <div class="todo" >
            <img src="images/logoCecy.png" alt="Logo cecy">
            <div class="encabezado">
                <label>Colegio de Estudios Científicos y Tecnológicos del Estado de Jalisco</label><br>
                <label>PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</label><br>
                <label>Folio:</label> <i>{{ $pase->IdPaseSal }}</i>
            </div>
            <hr width=250>
            <p><h2>PASE DE SALIDA</h2><p>
            <p><h4>ESTIMADO COMPAÑERO(A):</h4><p>   
            <p class="c3">Favor de permitir la salida del plantel a el (la) alumno(a), es importante que se registre su salida en bitácora.</p>
            <p><label><b>Fecha:</label><i>{{ $pase->Fecha }}</i> 
            <p><label><b>Alumno(a):</label> <i>{{ $alumno->Nombre }}</i>
            <p><label><b>Grado:</label> <i>{{ $alumno->Grado }}</i>
            <label><b>Grupo: <i>{{ $alumno->Grupo }}</i>
            <label><b>Turno: <i>{{ $alumno->Turno }}</i>
            <p><label><b>Padre o Tutor:</label> <i>{{ $familiar->NombrePadre }} {{ $familiar->ApePaternoPadre }} {{ $familiar->ApeMaternoPadre }}</i>
            <p><label><b>Tel/Cel:</label> <i>{{ $familiar->TelefonoPadre }}</i>
            <p id="motivo"><label><b>Motivo:</label></p> <i>{{ $pase->Motivo }}</i> 
            <p id="autoriza"><label >Autorizó salida</label></p>
            <p id="firma"><label >Nombre y Firma</label></p>
        </div>

   </BODY>
</HTML>

<style>
    .todo{
        width: 260;
        height: 400;
        border: 1px solid black;
        padding:5px;
    }
    img{
        width: 70px; height: 25px;
     }

     .encabezado{
        font-size: .58em; 
        float: right; 
        text-align: right;     
    }
    
    .c3{
        text-align: center;
    }
    h2{
        text-align: center;
    }
    h4{
        text-align: center;
    }

    #autoriza{
        text-align: center;     
    }

    #firma{
        text-align: center;
        margin:-10;
    }
    #autoriza{
        padding-top: 40px; 
        text-decoration:overline; 
    }

    #motivo{
        margin: 0;
    }

    i{
        border:none;
        border-bottom:1px solid black;
    }

    p{
        font-size:11;
    }

    </style>