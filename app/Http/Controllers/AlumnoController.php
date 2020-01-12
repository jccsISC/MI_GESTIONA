<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;

class AlumnoController extends Controller
{
    public function buscar(Request $request) {
        $buscar = $request->query('buscar');
        return tblalumno::where('IdAlumno', $buscar)->orWhere('Nombre', $buscar)->first();
    }

    public function familiares(tblalumno $tblalumno) {
        return $tblalumno->familiares;
    }
}
