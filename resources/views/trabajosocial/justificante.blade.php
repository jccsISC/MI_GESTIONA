<HTML>
    <HEAD>
       <TITLE>JUSTIFICANTE</TITLE>
    </HEAD>
    <meta charset="UTF-8">
    <BODY>
        <div class="todo" >
            <img src="images/logoCecy.png" alt="Logo cecy">

            <div class="encabezado">
                <label>Colegio de Estudios Científicos y Tecnológicos del Estado de Jalisco</label><br>
                <label>PLANTEL PUERTO VALLARTA PITILLAL (LAS JUNTAS)</label><br>
                <label>Folio:</label>
            </div>

            <hr class="linea" width=670px>
            <h4>JUSTIFICANTE DE FALTAS</h4>

            <div class="quien">
                <label>DE: DEPARTAMENTO DE TRABAJO SOCIAL</label>
                <label>A: PREFECTURA Y DOCENTE</label>   
            </div>   
            
            <p class="texto">Por medio de la presente comunico a usted que el (la) alumno(a) 
            <input type="text" style="width:313px"> del grado:
            <input type="text" style="width:80px"> grupo:
            <input type="text" style="width:80px"> turno: 
            <input type="text" style="width:80px"> carrera:
            <input type="text" style="width:100px">. Justifico sus inasistencias a clases
            ante éste departamento el (los) días:
            <input type="number" style="width:337px">. Por lo que solicito justiicarle
            las inasistencias de los días proporcionados debido a:
            <input id="motivo" type="text" style="width:300px">.
            <p><label><b><i>(No justifica trabajos).</i></b></label><p></p>

            <p id="atte"><label>ATENTAMENTE</label></p><br><br>
 
            <div class="brenda">
                <hr class="linea1"  width=150><br>
                <label id="nombre1">LIC. BRENDA GABRIELA GONZALEZ RAMIREZ</label><br>
                <label id="puesto1">TRABAJADORA SOCIAL</label>
            </div>
            
            <div class="sandra">
            <hr class="linea2"  width=150><br>
            <label id="nombre2">LIC. SANDRA ISABEL GOMEZ REAL</label><br>
            <label id="puesto2">DIRECTORA DEL PLANTEL PITILLAL (LAS JUNTAS)</label>
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
        margin:0;
    }

    #de{
        display: inline-block;
    }

    #fecha{
        display: inline-block;
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
        
    }

    .sandra{
        font-size: 12px;
        text-align: right;
       
    }
    
    #atte{
        text-align: center;
    }

    input {
        border:none;
        border-bottom:1px solid black;
    }

    hr.linea {
        border-top: 2px solid black;
    }

    hr.linea1 {
        border-top: 1px solid black; 
        
    }

    hr.linea2 {
        border-top: 1px solid black;
    }

    #nombre{
        padding-left: 40px;
    }

    #puesto{
        padding-left: 20px;    
    }

    #puesto2{
        font-size: 12px;
        text-align: right;
       
    }

    #nombre2{
        font-size: 12px;
        text-align: right;
    
    }


 </style>