<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbltalleres;
use App\tbldettalleres;

class TalleresController extends Controller
{

    public function grupos(){
        return tbldettalleres::with('taller')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return tbltalleres::with('grupos')->get();
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
        $atributos = $this->validate($request, [
            'Nombre' => 'required',
            'Fecha' =>'required',
            'Responsable' => 'required',
            'Institucion' => 'required',
            'Hora' => 'required'
        ]);

        $taller = tbltalleres::create(
            $atributos + ['Existe' => 1]
        );
        
        if ($grupos = $request->input('grupos')) {
            $grupos = array_filter($grupos, function($grupo) {
                return !empty($grupo['Semestre']) && !empty($grupo['Grupo']) && !empty($grupo['Cantidad']);
            });

           $taller->grupos()->createMany(array_values($grupos));

        }

        return $taller->load('grupos');
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
    public function update(Request $request, tbltalleres $tbltalleres)
    {
        $atributos = $this->validate($request, [
            'Nombre' => 'required',
            'Fecha' =>'required',
            'Responsable' => 'required',
            'Institucion' => 'required',
            'Hora' => 'required'
        ]);

        $tbltalleres->update($atributos);
        
        if ($grupos = $request->input('grupos')) { 
            $grupos = array_filter($grupos, function($grupo) {
                return !empty($grupo['Semestre']) && !empty($grupo['Grupo']) && !empty($grupo['Cantidad']);
            });

            foreach ($grupos as $grupo) {
                if (isset($grupo['IdDetTaller'])) {
                    $g = tbldettalleres::find($grupo['IdDetTaller']);
                    $g->update($grupo); 
                } else {
                    $tbltalleres->grupos()->create($grupo);
                }
            }
        }

        if ($eliminados = $request->input('eliminados')) { 
            tbldettalleres::destroy($eliminados);
        }

        return $tbltalleres->load('grupos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbltalleres $tbltalleres)
    {
        $tbltalleres->delete();
        return 'Eliminado';
    }
}
