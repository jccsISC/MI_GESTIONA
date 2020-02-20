<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblpasesalida;

class PaseDeSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return tblpasesalida::all();
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
        if ($request->ajax()) {

            $atributos = $this->validate($request, [
                'IdFamiliar' => 'IdFamiliar',
                'Fecha' => 'required',
                'Motivo' => 'required',
                'Descripcion' => 'required'
            ]);

            return tblpasesalida::create([
                'IdFamiliar' => $request->input('IdFamiliar'),
                'Fecha' => $request->input('Fecha'),
                'Motivo' => $request->input('Motivo'),
                'Descripcion' => $request->input('Descripcion'),

                'Existe' => 1
            ]);
        } else {
            return view('home');
        }

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
    public function destroy(tblpasesalida $tblpasesalida)
    {
        $tblpasesalida->delete();
        
        return response('Eliminado');
    }
}
