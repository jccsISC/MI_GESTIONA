<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblyonoabandono;

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
            'IdFamiliar' => 'required',
            'Motivo' => 'required',
            'Derivacion' => 'required',
            'DescripcionDer' => 'required',
            'Status' => 'required',
            'Seguimiento' => 'required',
            'Observaciones' => 'required',
            'ResponsableSeguimiento' => 'required'
        ]);

        return tblyonoabandono::create(
            $atributos + [
                'Existe' => 1,
                'FechaInicio' => date('Y-m-d'),
                'FechaFin' => $atributos['Status'] ? date('Y-m-d') : NULL
            ]
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
