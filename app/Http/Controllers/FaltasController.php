<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;
use App\tblhorariomaestros;
use App\tblinasistencias;
use App\tblincidencias;
use App\User;

class FaltasController extends Controller
{

    public function faltas(tblalumno $tblalumno) {
        $data = tblinasistencias::whereHas('detalles',function($q) use ($tblalumno)
        {
            $q->where('IdAlumno', $tblalumno->IdAlumno);
        
        })->with(['detalles' => function($query) use ($tblalumno) {
            $query->where('IdAlumno', $tblalumno->IdAlumno);
        }, 'horarioMaestro'])->get()->toArray();
        //SELECT nombre, Count(faltas) GROUP BY nombre
        foreach ($data as $key => $falta) {
            foreach ($falta['detalles'] as $detalle) {
                $data[$key]['parciales'][$detalle['parcial']][] = $detalle;
            }
        }
        return $data;
    }


    public function registrarFaltas() {
        return auth()->user()->horarioMaestro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'Materia' => 'required',
            'Carrera' => 'required',
            'Grado' => 'required',
            'Grupo' => 'required'
        ]);

        return tblhorariomaestros::create([
            'Nombre' => $atributos['Nombre'], 
            'Tipo' => $atributos['Tipo'], 'Existe' => 1 
        ]);
    }

    public function grupos () {
        return auth()->user()->horarioMaestro;
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
