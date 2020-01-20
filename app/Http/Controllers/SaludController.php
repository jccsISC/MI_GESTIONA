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
        
        $imc = $request->input('Peso') / ($request->input('Estatura')^2);

        return tblsalud::create(
            $atributos + [
                'Existe' => 1,
                'IMC' => $imc, 
                'DetAlergias' => $request->input('DetAlergias'),
                'DetProbPosturales' => $request->input('DetProbPosturales'),
                'DetOtros' => $request->input('DetOtros'),
                'DetGravidez' => $request->input('DetGravidez'),
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  tblsalud  $tblsalud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tblsalud $tblsalud)
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
        
        $imc = $request->input('Peso') / ($request->input('Estatura')^2);

        $tblsalud->update(
            $atributos + [
                'IMC' => $imc, 
                'DetAlergias' => $request->input('DetAlergias'),
                'DetProbPosturales' => $request->input('DetProbPosturales'),
                'DetOtros' => $request->input('DetOtros'),
                'DetGravidez' => $request->input('DetGravidez'),
            ]
        );

        return $tblsalud;
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
