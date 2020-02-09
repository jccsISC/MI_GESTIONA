<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblincidencias;
use App\tblalumno;

class IncidenciasController extends Controller
{

    public function incidencias(tblalumno $tblalumno){
        return $tblalumno->incidencias()->with('familiar')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           
        if ($request->ajax()) {
            return tblalumno::has('incidencias')->orHas('reportes')->with(['incidencias.familiar', 'reportes.familiar'])->get();
        } else {
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atributos = $this->validate($request, [
            'IdAlumno' => 'required',
            'IdFamiliar' => 'required',
            'Comentarios' => 'required',
            'TipoFalta' => 'required',
            'Status' => 'required',
            'ComentariosPa' => 'required',
            'Observaciones' => 'required',
            'Derivacion' => 'required',
            'DescripcionReporte' => 'required',
            'ResponsableSeguimiento' => 'required',
            'TipoReporte' => 'required'
        ]);

        $incidencia = tblincidencias::create(
            $atributos + [
                'Existe' => 1, 
                'FechaInicio' => date('Y-m-d'), 
                'FechaFin' => $atributos['Status'] ? date('Y-m-d') : null
            ]
        );
        return $incidencia->load('familiar');

    }



    public function reporteIncidencia(Request $request)
    {
        $atributos = $this->validate($request, [
            'IdAlumno' => 'required',
            'IdFamiliar' => 'required',
            'Motivo' => 'required',
            'Derivacion' => 'required',
            'DescripcionReporte' => 'required',
            'Observaciones' => 'required',
            'Comentarios' => 'required',
            'ResponsableSeguimiento' => 'required',
            'TipoReporte' => 'required'
        ]);

        $incidencia = tblincidencias::create(
            $atributos + [
                'Existe' => 1, 
                'FechaInicio' => date('Y-m-d')
            ]
        );
        return $incidencia->load('familiar');

    }

    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\tblincidencias $tblincidencias
     * @return \Illuminate\Http\Response
     */
    public function editarIncidencia(Request $request, tblincidencias $tblincidencias)
    {
        $atributos = $this->validate($request, [
            'IdAlumno' => 'required',
            'IdFamiliar' => 'required',
            'ComentariosPa' => 'required',
            'Derivacion' => 'required',
            'DescripcionReporte' => 'required',
            'Observaciones' => 'required',
            'Comentarios' => 'required',
            'ResponsableSeguimiento' => 'required',
            'TipoReporte' => 'required'
        ]);
        
        $tblincidencias->update($atributos);
        return $tblincidencias->load('familiar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  tblincidencias $tblincidencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tblincidencias $tblincidencias)
    {
        $atributos = $this->validate($request, [
            'IdAlumno' => 'required',
            'IdFamiliar' => 'required',
            'Comentarios' => 'required',
            'TipoFalta' => 'required',
            'Status' => 'required',
            'ComentariosPa' => 'required',
            'Observaciones' => 'required',
            'Derivacion' => 'required',
            'DescripcionReporte' => 'required',
            'ResponsableSeguimiento' => 'required',
            'TipoReporte' => 'required'
        ]);

        $tblincidencias->update($atributos);
        return $tblincidencias->load('familiar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
