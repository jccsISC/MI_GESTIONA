<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;

class OrientacionEController extends Controller
{
    public function reportes(){
        return tblalumno::has('reportes')->with('reportes')->get();
    }
}
