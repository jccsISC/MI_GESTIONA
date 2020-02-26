<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <TITLE>JUSTIFICANTE</TITLE>
    </HEAD>
    <BODY>
        <div class="todo" >
            <img src="images/logoCecy.png" alt="Logo cecy">

            <div class="encabezado">
                <label>Colegio de Estudios Científicos y Tecnológicos del Estado de Jalisco</label><br>
                <label>PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</label><br>
                
                <label>Folio:</label>
                <i>{{ $justi->IdJustificante }}</i>
            </div>

            <hr class="linea" width=670px>
            <h4>JUSTIFICANTE DE FALTAS</h4>

            <div class="quien">
                <label>DE: DEPARTAMENTO DE TRABAJO SOCIAL</label><br>
                <div class="fecha">
                    <label>FECHA: <i>{{ $justi->Fecha }}</i> 
                </div>
                <label>A: PREFECTURA Y DOCENTE</label>   
            </div>   
            
            <div class="texto">
                <p>Por medio de la presente comunico a usted que el (la) alumno(a) <i>{{ $alumno->Nombre }}</i>
                del grado: <i>{{ $alumno->Grado }}</i>  
                grupo: <i>{{ $alumno->Grupo }}</i>  
                turno: <i>{{ $alumno->Turno }}</i>
                carrera: <i>{{ $alumno->Carrera }}</i>.
                Justifico sus inasistencias a clases ante éste departamento el (los) días:
                <i>{{ $justi->FechaInicio }}</i> - <i>{{ $justi->FechaFin }}</i> 
                Por lo que solicito justificarle las inasistencias de los días proporcionados debido a:
                <i>{{ $justi->Motivo }}</i>.
                <p><label><b><i>(No justifica trabajos).</i></b></label><p></p>
            </div>

            <p id="atte"><label>ATENTAMENTE</label></p><br><br>
 
            <div class="brenda">
                <label class="nombre">LIC. BRENDA GABRIELA GONZALEZ RAMIREZ</label><br>
                <label class="puesto1">TRABAJADORA SOCIAL</label>
            </div>
            
            <div class="sandra">
                <label class="nombre">LIC. SANDRA ISABEL GOMEZ REAL</label><br>
                <label class="puesto2">DIRECTORA DEL PLANTEL PITILLAL (LAS JUNTAS)</label>
            </div>
        </div>
 
    </BODY>
 </HTML>
 
 <style>
    .todo{
        width: 500;
        height: 400;
    }
     
     img{
        width: 130px; height: 40px;
     }

     .encabezado{
        font-size: .70em; 
        float: right; 
        text-align: right;     
    }

    .quien{
        font-size: .9em; 
    }

    h4{
        text-align: right;   
    }

    .texto{
        text-align: justify;
    }

    .brenda{
        font-size: 12px;
        text-align: left;
        float: left; 
       
    }

    .sandra{
        font-size: 12px;
        text-align: right; 
        float: right;       
    }
    
    #atte{
        text-align: center;
    }

    i{
        border-bottom:1px solid black;
    }

    hr.linea {
        border-top: 2px solid black;
    }

    .fecha{
        float:right;
    }

    .nombre{
        text-decoration:overline;
    }
 </style>