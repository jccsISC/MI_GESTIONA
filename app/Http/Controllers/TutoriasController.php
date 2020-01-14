<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbldetcalificacion;
use App\tblcalificacion;
use App\tbldetalleinasistencias;
use App\tblalumno;

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

    public function inasistencias()
    {
        $year = date('Y');
        $month = date('m');;
        $day = date('d');;
         
        # Obtenemos el numero de la semana
        $semana = date("W",mktime(0,0,0,$month,$day,$year));     
        # Obtenemos el día de la semana de la fecha dada
        $diaSemana = date("w",mktime(0,0,0,$month,$day,$year));
         
        # el 0 equivale al domingo...
        if ($diaSemana == 0) {
            $diaSemana=7;
        }

        # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
        $primerDia = date("Y-m-d", mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year)); 
        $primero = date("d-m-Y", mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year)); 
        # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
        $ultimoDia = date("Y-m-d", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));
        $ultimo = date("d-m-Y", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));
        

        $data = tblalumno::whereHas('inasistencias', function($q) use($primerDia, $ultimoDia)
        {
            $q->whereBetween('Fecha', [$primerDia, $ultimoDia])->havingRaw('count(*) > 2');
        
        })->with(['inasistencias' => function($query) use($primerDia, $ultimoDia) {
            $query->whereBetween('Fecha', [$primerDia, $ultimoDia]);
        },'inasistencias.inasistencia.horarioMaestro'])->get()->toArray();

        foreach($data as $key => $alumno) {
            foreach($alumno['inasistencias'] as $inasistencia) {
                $data[$key]['inasistenciasMateria'][$inasistencia['IdInasistencia']]['data'][] = $inasistencia;
                $data[$key]['inasistenciasMateria'][$inasistencia['IdInasistencia']]['materia'] = $inasistencia['inasistencia']['horario_maestro']['Materia'];
            }
        }

        return [
            'data' => $data,
            'fechas' => ['inicio' => $primero, 'fin' => $ultimo, 'semana' => $semana]
        ];
    }

    public function faltasSemana(tblalumno $tblalumno) {
        $year = date('Y');
        $month = date('m');;
        $day = date('d');;
         
        # Obtenemos el numero de la semana
        $semana = date("W",mktime(0,0,0,$month,$day,$year));     
        # Obtenemos el día de la semana de la fecha dada
        $diaSemana = date("w",mktime(0,0,0,$month,$day,$year));
         
        # el 0 equivale al domingo...
        if ($diaSemana == 0) {
            $diaSemana=7;
        }

        # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
        $primerDia = date("Y-m-d", mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year)); 
        # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
        $ultimoDia = date("Y-m-d", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));


        //return $tblalumno->load('inasistencias');

        $data = $tblalumno->inasistencias()->whereBetween('Fecha', [$primerDia, $ultimoDia])->with('inasistencia.horarioMaestro')->get()->toArray();

        $return = [];
        foreach($data as $key => $inasistencia) {
            if (!isset($return[$inasistencia['inasistencia']['IdInasistencia']]['materia'])) {
                $return[$inasistencia['inasistencia']['IdInasistencia']]['materia'] = $inasistencia['inasistencia']['horario_maestro']['Materia'];
            }
            $return[$inasistencia['IdInasistencia']]['data'][] = $inasistencia['Fecha'];
        }

        return $return;
    }

}
