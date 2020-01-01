<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblbeca;

class BecasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return tblbeca::all();
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
            'Nombre' => 'required',
            'Tipo' => 'required'
        ]);
        
        tblbeca::create(['Nombre' => $atributos['Nombre'], 'Tipo' => $atributos['Tipo'], 'Existe' => 1]);
        tblbeca::create($atributos);

        return response('Actualizado', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tblbeca $tblbeca
     * @return \Illuminate\Http\Response
     */
    public function show(tblbeca $tblbeca) {
        return $tblbeca;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tblbeca $tblbeca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tblbeca $tblbeca) {
        $atributos = $this->validate($request, [
            'Nombre' => 'required',
            'Tipo' => 'required'
        ]);
        
        $tblbeca->update($atributos);

        return response('Actualizado', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\tblbeca $tblbeca
     * @return \Illuminate\Http\Response
     */
    public function destroy(tblbeca $tblbeca) {
        $tblbeca->update([
            'Nombre' => '',
            'Tipo' => '',
            'Existe' => 0
        ]);

        return response('Eliminado');
    }
}
