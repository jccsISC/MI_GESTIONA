<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbljustificante;

class JustificantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return tbljustificante::all();
        } else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'FechaInicio' => 'required',
                'FechaFin' => 'required',
                'Motivo' => 'required'
            ]);

            return tbljustificante::create([
                'FechaInicio' => $request->input('FechaInicio'),
                'FechaFin' => $request->input('FechaFin'),
                'Motivo' => $request->input('Motivo'),
                'Existe' => 1
            ]);
            /*$pokemon->trainer()->associate($trainer)->save();*/
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
     * @param  \App\tbljustificante $tbljustificante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbljustificante $tbljustificante)
    {
        //validamos la peticion si es de tipo ajax
        if($request->ajax()){

            $atributos = $this->validate($request, [
                'FechaInicio' => 'required',
                'FechaFin' => 'required',
                'Motivo' => 'required'
            ]);
            
            $tbljustificante->update($atributos);
            return $tbljustificante;
        }else{
            return view('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbljustificante $tbljustificante
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbljustificante $tbljustificante)
    {
        $tbljustificante->delete();
        
        return response('Eliminado');
    }

    public function imprimirJ(){
        $pdf = \PDF::loadView('/trabajosocial.justificante');
        return $pdf->download('justificante.pdf');
   }

   public function imprimirP(){
    $pdf = \PDF::loadView('/trabajosocial.pase');
    return $pdf->download('pase.pdf');
}
}
