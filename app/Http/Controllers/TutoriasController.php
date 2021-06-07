<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbldetcalificacion;
use App\tblcalificacion;
use App\tbldetalleinasistencias;
use App\tblalumno;
use App\tblyonoabandono;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumnosImport;
use App\Imports\CalifiacionImport;
use App\Imports\DetCalifiacionImport;
use App\Imports\DetInasistenciaImport;
use App\Imports\FamiliarImport;
use App\Imports\HorarioImport;
use App\Imports\InasistenciaImport;

class TutoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }


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

        foreach ($data as $alumno => $unidades) {
            
            // si no hay reporte: Se muestra
            // si hay reporte y el estatus es 0 (pendiente): Se muestra
            // si hay reporte y el estatus es 1 (concluido): No se muestra

            // Flujo:
            // alumno reprobado: aparece
            // alumno tiene reporte: aparece
            // alumno concluye su reporte: desaparece
            // alumno reprueba otra vez: no vuelve a aparecer en la vida porque su ultimo reporte ya esta concluido.
            foreach ($unidades as $unidad) {
                $reporte = tblyonoabandono::where('IdAlumno', $alumno)->where('Unidad', $unidad['Unidad'])->with('familiar')->orderBy('IdYonoabandono', 'desc')->first();
            if (!empty($reporte) && $reporte->Status) {
                continue;
            }
                $return[$alumno . '_' . $unidad['Unidad']]['Unidad'] = $unidad['Unidad'];
                $return[$alumno . '_' . $unidad['Unidad']]['Materias'][] = $unidad['calificacion']['Materia'];
                $return[$alumno . '_' . $unidad['Unidad']]['Alumno'] = $unidad['calificacion']['alumno'];
                $return[$alumno . '_' . $unidad['Unidad']]['Reporte'] = $reporte;
            }
        }

        return array_values($return);
    }

    public function inasistencias()
    {
        $year = date('Y');
        $month = date('m');;
        $day = date('d');;

        # Obtenemos el numero de la semana
        $semana = date("W", mktime(0, 0, 0, $month, $day, $year));
        # Obtenemos el día de la semana de la fecha dada
        $diaSemana = date("w", mktime(0, 0, 0, $month, $day, $year));

        # el 0 equivale al domingo...
        if ($diaSemana == 0) {
            $diaSemana = 7;
        }

        # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
        $primerDia = date("Y-m-d", mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year));
        $primero = date("d-m-Y", mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year));
        # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
        $ultimoDia = date("Y-m-d", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));
        $ultimo = date("d-m-Y", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));


        $data = tblalumno::whereHas('inasistencias', function ($q) use ($primerDia, $ultimoDia) {
            $q->whereBetween('Fecha', [$primerDia, $ultimoDia])->havingRaw('count(*) > 2');
        })->with(['inasistencias' => function ($query) use ($primerDia, $ultimoDia) {
            $query->whereBetween('Fecha', [$primerDia, $ultimoDia]);
        }, 'inasistencias.inasistencia.horarioMaestro'])->get()->toArray();

        foreach ($data as $key => $alumno) {
            foreach ($alumno['inasistencias'] as $inasistencia) {
                $data[$key]['inasistenciasMateria'][$inasistencia['IdInasistencia']]['data'][] = $inasistencia;
                $data[$key]['inasistenciasMateria'][$inasistencia['IdInasistencia']]['materia'] = $inasistencia['inasistencia']['horario_maestro']['Materia'];
            }
        }

        return [
            'data' => $data,
            'fechas' => ['inicio' => $primero, 'fin' => $ultimo, 'semana' => $semana]
        ];
    }

    public function faltasSemana(tblalumno $tblalumno)
    {
        $year = date('Y');
        $month = date('m');;
        $day = date('d');;

        # Obtenemos el numero de la semana
        $semana = date("W", mktime(0, 0, 0, $month, $day, $year));
        # Obtenemos el día de la semana de la fecha dada
        $diaSemana = date("w", mktime(0, 0, 0, $month, $day, $year));

        # el 0 equivale al domingo...
        if ($diaSemana == 0) {
            $diaSemana = 7;
        }

        # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
        $primerDia = date("Y-m-d", mktime(0, 0, 0, $month, $day - $diaSemana + 1, $year));
        # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
        $ultimoDia = date("Y-m-d", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));


        //return $tblalumno->load('inasistencias');

        $data = $tblalumno->inasistencias()->whereBetween('Fecha', [$primerDia, $ultimoDia])->with('inasistencia.horarioMaestro')->get()->toArray();

        $return = [];
        foreach ($data as $key => $inasistencia) {
            if (!isset($return[$inasistencia['inasistencia']['IdInasistencia']]['materia'])) {
                $return[$inasistencia['inasistencia']['IdInasistencia']]['materia'] = $inasistencia['inasistencia']['horario_maestro']['Materia'];
            }
            $return[$inasistencia['IdInasistencia']]['data'][] = $inasistencia['Fecha'];
        }

        return $return;
    }

    public function importExcelAlumno(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new AlumnosImport, $file);
        Excel::import(new FamiliarImport, $file);
        return back()->with('message', 'Importación de alumnos completada');
    }

    public function importExcelHorarioM(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new HorarioImport, $file);
        return back()->with('message', 'Importación de horario completada');
    }

    public function importExcelFaltas(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new InasistenciaImport, $file);
        Excel::import(new DetInasistenciaImport, $file);
        return back()->with('message', 'Importación de inasistencias completada');
    }

    public function importExcelCalificacion(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new CalifiacionImport, $file);
        Excel::import(new DetCalifiacionImport, $file);
        return back()->with('message', 'Importación de inasistencias completada');
    }
}
