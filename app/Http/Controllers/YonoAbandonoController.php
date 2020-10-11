<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblyonoabandono;
use Barryvdh\DomPDF as PDF;
use App\tblalumno;
use App\tblfamiliare;

class YonoAbandonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return tblyonoabandono::all();
        } else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atributos = $this->validate($request, [
            'IdAlumno' => 'required',
            'Nombrequienderiva' => 'required',
            'Motivo' => 'required',
            'Derivacion' => 'required',
            'DescripcionDer' => 'required',
            'Status' => 'required',
            'Seguimiento' => 'required',
            'Observaciones' => 'required',
            'ResponsableSeguimiento' => 'required',
            'user_id' => 'required'
        ]);

        return tblyonoabandono::create(
            $atributos + [
                'Existe' => 1,
                'FechaInicio' => date('Y-m-d'),
                'IdFamiliar' => $request->input('IdFamiliar'),
                'FechaFin' => $atributos['Status'] ? date('Y-m-d') : NULL
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tblyonoabandono $tblyonoabandono)
    {
        $atributos = $this->validate($request, [
            'IdAlumno' => 'required',
            'Nombrequienderiva' => 'required',
            'IdFamiliar' => 'required',
            'Motivo' => 'required',
            'Derivacion' => 'required',
            'DescripcionDer' => 'required',
            'Status' => 'required',
            'Seguimiento' => 'required',
            'Observaciones' => 'required',
            'ResponsableSeguimiento' => 'required',
            'user_id' => 'required'
        ]);
        
        $tblyonoabandono->update(
            $atributos + [
                'FechaFin' => $atributos['Status'] ? date('Y-m-d') : NULL
            ]
        );
        return $tblyonoabandono;
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

    public function imprimirYonoAbandono(tblyonoabandono $tblyonoabandono){
        $reporte = $tblyonoabandono;
        $alumno = $tblyonoabandono->alumno;    
        $familiar = $tblyonoabandono->familiar;  
        $pdf = \PDF::loadView('/tutorias.reporte', compact('reporte','alumno','familiar'));
        return $pdf->download('reporte.pdf');
    }
}
