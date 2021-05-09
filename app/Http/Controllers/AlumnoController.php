<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;

class AlumnoController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            return tblalumno::all();
        } else {
            return view('home');
        }
    }


    public function buscar(Request $request) {
        $buscar = $request->query('buscar');
        $query = null;
        if ($request->query('opciones')) {
            $query = tblalumno::where('IdAlumno', 'like', '%' . $buscar . '%');
            $query->orWhere('Nombre', 'like', '%' . $buscar . '%');
        } else {
            $query = tblalumno::where('IdAlumno', $buscar);
            $query->orWhere('Nombre', $buscar);
        }
        
        return $request->query('opciones') ? $query->limit(8)->get() : $query->first();
    }

    public function familiar(tblalumno $tblalumno) {
        return $tblalumno->familiar;
    }

    public function calificaciones(tblalumno $tblalumno) {
        return $tblalumno->calificaciones()->with('detalles')->get();
    }
    
}
