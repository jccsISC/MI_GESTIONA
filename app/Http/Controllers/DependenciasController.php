<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbldependencia;

class DependenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*return tbldependencia::where('user_id', auth()->id())->get();*/
        
        if ($request->ajax()) {
            return tbldependencia::all();
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
        //validamos la peticion si es de tipo ajax
        if($request->ajax()){
            $dependencia = new tbldependencia();
            $dependencia->Nombre = $request->input('Nombre');
            $dependencia->Direccion = $request->input('Direccion');
            $dependencia->Giro = $request->input('Giro');
            $dependencia->Telefono = $request->input('Telefono');
            $dependencia->Responsable = $request->input('Responsable');
            $dependencia->TipoVinculacion = $request->input('TipoVinculacion');
            $dependencia->Existe = 1;
            $dependencia->save();
            /*$pokemon->trainer()->associate($trainer)->save();*/
            
            return $dependencia;
        }else{
            return view('home');
        }


      /*  $atributos = $this->validate($request, [
            'Nombre' => 'required',
            'Direccion' => 'required',
            'Giro' => 'required',
            'Telefono' => 'required',
            'Responsable' => 'required',
            'TipoVinculacion' => 'required',
        ]);
        
        tblbeca::create(['Nombre' => $atributos['Nombre'], 'Direccion' => $atributos['Direccion'], 'Giro' => $atributos['Giro'],
                         'Telefono' => $atributos['Telefono'], 'Responsable' => $atributos['Responsable'], 
                         'TipoVinculacion' => $atributos['TipoVinculacion'],'Existe' => 1 ]);
        tblbeca::create($atributos);

        return response('Actualizado', 200);*/
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
     * @param  \App\tbldependencia $tbldependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbldependencia $tbldependencia)
    {
         //validamos la peticion si es de tipo ajax
         if($request->ajax()){

            $atributos = $this->validate($request, [
                'Nombre' => 'required',
                'Direccion' => 'required'
            ]);
            
            $tbldependencia->update($atributos);
            return $tbldependencia;
        }else{
            return view('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbldependencia $tbldependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbldependencia $tbldependencia)
    {
        $tbldependencia->delete();
        
        return response('Eliminado');
    }
}
