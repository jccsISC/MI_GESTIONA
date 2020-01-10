<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;
use App\tblbeca;
use App\tblserviciopracticas;

class TrabajoSocialController extends Controller
{
    
    public function alumnos(Request $request) {
        $tipo = $request->query('tipo');
        return tblalumno::has($tipo, '>', 3)->with($tipo)->get();
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
        return $tblalumno->pases()->with('familiar')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function justificantes(tblalumno $tblalumno) 
    {   //ver los cambios que me pidió kevin en la ultima llamada hay una foto
        return $tblalumno->justificantes;
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

}
