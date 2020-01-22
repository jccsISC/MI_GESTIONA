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
                <label>Folio:</label>
            </div>
            <hr width=350>
            <p><h1>PASE DE SALIDA</h1><p>
            <p><h3>ESTIMADO COMPAÑERO(A):</h3><p>   
            <p class="c3">Favor de permitir la salida del plantel a el (la) alumno(a), es importante que se registre su salida en bitácora.</p>

            <p><label>Fecha:</label>
            <input type="date" style="width:345px"></p>

            <p><label>Alumno(a):</label>
            <input type="text" style="width:313px"></p>

            <p><label>Grado:</label>
            <input type="text" style="width:80px">
            
            <label>Grupo:</label>
            <input type="text" style="width:80px">

            <label>Turno:</label>
            <input type="text" style="width:80px"></p>

            <p><label>Padre o Tutor:</label>
            <input type="text" style="width:296px"></p>

            <p><label>Tel/Cel:</label>
            <input type="number" style="width:337px"></p>

            <p id="motivo"><label>Motivo:</label></p>
            <input id="inpMot" type="textarea" style="width:200px ; height:135px">

            <hr id="linea"  width=180>  
            <p id="autoriza"><label >Autorizó salida</label></p>
            <p id="firma"><label >Nombre y Firma</label></p>
        </div>

   </BODY>
</HTML>

<style>
    .todo{
        width: 350;
        height: 500;
    }
    img{
        width: 130px; height: 40px;
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
        text-align: right;
        padding-right: 73;
        margin: -35;
     
    }

    #firma{
        text-align: right;
        margin: 35;
    }

    #linea{
        float: right;
        margin-top: 90;
        
    }

    #motivo{
        margin: 0;
    }
    
    #inpMot{
        border-radius: 5px;
        border:1px solid black;
    }

    input {
        border:none;
        border-bottom:1px solid black;
    }
    </style>