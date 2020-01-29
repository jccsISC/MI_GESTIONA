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
    public function index(Request $request) {

        if ($request->ajax()) {
            return tblbeca::all();
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
                'Nombre' => 'required',
                'Tipo' => 'required'
            ]);
    
            return tblbeca::create(['Nombre' => $atributos['Nombre'], 'Tipo' => $atributos['Tipo'], 'Existe' => 1 ]);
        } else {
            return view('home');
        }
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
        return $tblbeca;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\tblbeca $tblbeca
     * @return \Illuminate\Http\Response
     */
    public function destroy(tblbeca $tblbeca) {
        
        $tblbeca->delete();

        return response('Eliminado');
    }
}
