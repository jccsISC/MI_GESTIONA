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
                <label>Folio:</label>@foreach ($pase as $p) <i>{{ $p->IdPaseSal }}</i> @endforeach 
            </div>
            <hr width=300>
            <p><h1>PASE DE SALIDA</h1><p>
            <p><h3>ESTIMADO COMPAÑERO(A):</h3><p>   
            <p class="c3">Favor de permitir la salida del plantel a el (la) alumno(a), es importante que se registre su salida en bitácora.</p>
            <p><label><b>Fecha:</label>@foreach ($pase as $p) <i>{{ $p->Fecha }}</i> @endforeach 
            <p><label><b>Alumno(a):</label>@foreach ($alumno as $a) <i>{{ $a->Nombre }}</i> @endforeach 
            <p><label><b>Grado:</label>@foreach ($alumno as $a) <i>{{ $a->Grado }}</i> @endforeach           
            <label><b>Grupo:@foreach ($alumno as $a) <i>{{ $a->Grupo }}</i> @endforeach 
            <label><b>Turno:@foreach ($alumno as $a) <i>{{ $a->Turno }}</i> @endforeach 
            <p><label><b>Padre o Tutor:</label>@foreach ($familiar as $f) <i>{{ $f->Nombre }}</i> @endforeach  
            <p><label><b>Tel/Cel:</label>@foreach ($familiar as $f) <i>{{ $f->Telefono }}</i> @endforeach 
            <p id="motivo"><label><b>Motivo:</label></p>@foreach ($pase as $p) <i>{{ $p->Motivo }}</i> @endforeach 
      
            <hr id="linea"  width=180>  
            <p id="autoriza"><label >Autorizó salida</label></p>
            <p id="firma"><label >Nombre y Firma</label></p>
        </div>

   </BODY>
</HTML>

<style>
    .todo{
        width: 300;
        height: 500;
    }
    img{
        width: 80px; height: 30px;
     }

     .encabezado{
        font-size: .70em; 
        float: right; 
        text-align: right;     
    }
    
    .c3{
        text-align: center;
    }
    h1{
        text-align: center;
    }
    h3{
        text-align: center;
    }

    #autoriza{
        text-align: center;     
    }

    #firma{
        text-align: center;
        margin:-10;
    }
    #linea{
        margin-top: 50;  
    }

    #motivo{
        margin: 0;
    }

    i{
        border:none;
        border-bottom:1px solid black;
    }
    </style>