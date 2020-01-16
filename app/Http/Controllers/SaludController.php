<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblsalud;
use App\tblalumno;

class SaludController extends Controller
{
    
    public function salud(tblalumno $tblalumno){
        return $tblalumno->salud;
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
            'Estatura' => 'required',
            'IdAlumno' =>'required',
            'Peso' => 'required',
            'Anteojos' => 'required',
            'Alergias' => 'required',
            'ProbPosturales' => 'required',
            'PiePlano' => 'required',
            'ProbAuditivo' => 'required',
            'ProbLenguaje' => 'required',
            'Gravidez' => 'required',
            'ProbBucal' => 'required',
            'Pediculosis' => 'required',
            'Transtornos' => 'required',
            'Otros' => 'required',
        ]);

        $imc = 0; // @todo: calcular imc
        
        $imc = $request->input('Peso') / ($request->input('Estatura')^2);

        return tblsalud::create(
            $atributos +['Existe'=>1, 'IMC' => $imc]
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
