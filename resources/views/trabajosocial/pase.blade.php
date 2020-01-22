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
                <label>Folio:</label><i>{{$folio}}</i>
            </div>
            <hr width=300>
            <p><h1>PASE DE SALIDA</h1><p>
            <p><h3>ESTIMADO COMPAÑERO(A):</h3><p>   
            <p class="c3">Favor de permitir la salida del plantel a el (la) alumno(a), es importante que se registre su salida en bitácora.</p>
            <p><label><b>Fecha:</label><i>{{$fecha}}</i>
            <p><label><b>Alumno(a):</label><i>{{$nombre}}</i> 
            <p><label><b>Grado:</label><i>{{$grado}}</i>            
            <label><b>Grupo:</label><i>{{$grupo}}</i> 
            <label><b>Turno:</label><i>{{$turno}}</i> 
            <p><label><b>Padre o Tutor:</label><i>{{$familiar}}</i> 
            <p><label><b>Tel/Cel:</label><i>{{$tel}}</i> 
            <p id="motivo"><label><b>Motivo:</label></p><i>{{$motivo}}</i>.
      
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