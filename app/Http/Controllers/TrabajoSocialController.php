<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;
use App\tblbeca;
use App\tblserviciopracticas;
use App\tblpasesalida;
use App\tbljustificante;

class TrabajoSocialController extends Controller
{
    
    public function alumnos(Request $request) {

        $year=date('Y');
        $month=date('m');
        $day=date('d');
         
        # Obtenemos el numero de la semana
        $semana=date("W",mktime(0,0,0,$month,$day,$year));
         
        # Obtenemos el día de la semana de la fecha dada
        $diaSemana=date("w",mktime(0,0,0,$month,$day,$year));
         
        # el 0 equivale al domingo...
        if($diaSemana==0)
            $diaSemana=7;
         
        # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
        $primerDia=date("d-m-Y", mktime(0,0,0,$month,$day-$diaSemana+1,$year));
        $a=date("Y-m-d h:i:s",strtotime('first day of this month'));
         
        # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
        $ultimoDia=date("d-m-Y",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));
        $b=date("Y-m-d h:i:s", strtotime('last day of this month'));
        $tipo = $request->query('tipo');
        $data = tblalumno::whereHas($tipo, function($q) use($a, $b)
        {
            $q->whereBetween('Fecha', [$a, $b])->havingRaw('count(*) > 3');
        })->with([$tipo => function($query) use($a, $b) {
            $query->whereBetween('Fecha', [$a, $b]);
        }])->get();
        
        return [
            'data' => $data,
            'fechas' => ['Inicio'=>$a, 'Fin' => $b, 'Semana'=> $semana]
        ];
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function practica(tblalumno $tblalumno, Request $request) 
    {   //ver los cambios que me pidió kevin en la ultima llamada hay una foto
        $tipo = $request->query('tipo') == 'ss' ? 'Servicio Social' : 'Practicas Profesionales';
        return $tblalumno->practicas()->where('Tipo', $tipo)->with('dependencia')->first();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function becas(tblalumno $tblalumno) 
    {   //ver los cambios que me pidió kevin en la ultima llamada hay una foto
        return $tblalumno->becas;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function pases(tblalumno $tblalumno) 
    {   //ver los cambios que me pidió kevin en la ultima llamada hay una foto
        return $tblalumno->pases()
            ->where('Fecha', '>', date('Y-m-d', strtotime('first day of this month')))
            ->with('familiar')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function justificantes(tblalumno $tblalumno) 
    {   return $tblalumno->justificantes()
        ->where('Fecha', '>', date('Y-m-d', strtotime('first day of this month')))->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function agregarBeca(tblalumno $tblalumno, tblbeca $tblbeca) 
    {   
        $valido = TRUE;
        $tblalumno->becas->each(function($beca) use ($tblbeca, &$valido) {
            if ($beca->Tipo == $tblbeca->Tipo) {
                $valido = FALSE;
                return;
            }
        });
        //$valido = $tblalumno->becas->count() < 4 && $valido;

        if ($valido) {
            $tblalumno->becas()->attach($tblbeca->IdBeca, ['Existe' => 1]);
            return $tblbeca;
        }

        return response('No es valido', 400);    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function eliminarBecaAl(tblalumno $tblalumno, tblbeca $tblbeca) 
    {   
        $tblalumno->becas()->detach($tblbeca->IdBeca);

        return response('Eliminado');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function agregarPractica(tblalumno $tblalumno, Request $request) 
    {   
        $valido = TRUE;
        $tblalumno->practicas->each(function($practica) use ($request, &$valido) {
            if ($request->input('Tipo') == $practica->Tipo) {
                $valido = FALSE;
                return;
            }
        });
        if (!$valido) {
            return response('No es valido', 400);
        }

        $atributos = $this->validate($request, [
            'Tipo' => 'required',
            'IdDependencias' => 'required',
            'FechaInicio' => 'required',
            //'FechaFin' => 'required|date|after:FechaInicio'
            'FechaFin' => 'required'
        ]);

        $practica = new tblserviciopracticas($atributos + ['Existe' => 1]);
        $tblalumno->practicas()->save($practica);

        return $practica->load('dependencia');
    }

    public function agregarPase(tblalumno $tblalumno, Request $request) 
    {   
       $atributos = $this->validate($request, [
            'Motivo' => 'required',
            'Descripcion' => 'required',
            'IdFamiliar' => 'required'
        ]);

        $pase = new tblpasesalida($atributos + ['Existe' => 1, 'Fecha' => date('Y-m-d')]);
        $tblalumno->pases()->save($pase);

        return $pase->load('familiar');
    }

    public function agregarJustificante(tblalumno $tblalumno, Request $request) 
    {   
        $atributos = $this->validate($request, [
            'Motivo' => 'required',
            'FechaInicio' => 'required',
            'FechaFin' => 'required'
        ]);

        $justificante = new tbljustificante($atributos + ['Existe' => 1, 'Fecha' => date('Y-m-d')]);
        $tblalumno->justificantes()->save($justificante);

        return $justificante;
    }

}
