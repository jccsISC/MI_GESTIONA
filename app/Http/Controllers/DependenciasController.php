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
        
        if($request->ajax()){
            return tbldependencia::all();
        }else{
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

            

            // //como es una respuesta satisfactoria le notificaremos al request
            // return response()->json([
            //     /*"dependencia"=>$dependencia,*/
            //    // "message" => "La dependencia creado correctamente.",
            //     //le tenemos que mandar el pokemon que estamos creando creamos la llave pokemon
            //     "dependencia" => $dependencia
            // ],200);
            
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validamos la peticion si es de tipo ajax
         if($request->ajax()){
            $dependencia = tbldependencia::find($id);
            $dependencia->Nombre = $request->input('Nombre');
            $dependencia->Direccion = $request->input('Direccion');
            $dependencia->Giro = $request->input('Giro');
            $dependencia->Telefono = $request->input('Telefono');
            $dependencia->Responsable = $request->input('Responsable');
            $dependencia->TipoVinculacion = $request->input('TipoVinculacion');
            $dependencia->save();
            
            return $dependencia;
        }else{
            return view('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dependencia = tbldependencia::find($id);
        $dependencia->delete();
    }
}
