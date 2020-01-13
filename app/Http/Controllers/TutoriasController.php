<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbldetcalificacion;
use App\tblcalificacion;

class TutoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reprobados()
    {
            $return = [];
            $data = tbldetcalificacion::where('Calificacion', '<', 6)
                ->with('calificacion.alumno')
                ->get()->groupBy('calificacion.IdAlumno')->toArray();

                //return $data;

            foreach ($data as $alumno => $unidades ) {
                foreach ($unidades as $unidad) {
                    $return[$alumno .'_'.$unidad['Unidad']]['Unidad'] = $unidad['Unidad'];
                    $return[$alumno .'_'.$unidad['Unidad']]['Materias'][] = $unidad['calificacion']['Materia'];
                    $return[$alumno .'_'.$unidad['Unidad']]['Alumno'] = $unidad['calificacion']['alumno'];
                }
            }            

            return array_values($return);

            // return tblcalificacion::whereHas('detalles', function ($q) {
            //     $q->where('Calificacion', '<', 6);
            // })->with('detalles', 'alumno')->get()->groupBy('IdAlumno');
        
        // calificacion
        // - calificacion final

        // detalle
        // - unidad
        // - unidad
    }

}
