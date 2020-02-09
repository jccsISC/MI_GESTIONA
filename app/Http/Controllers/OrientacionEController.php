<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;

class OrientacionEController extends Controller
{
    public function reportes(){
        return tblalumno::whereHas('reportes', function($q) {
            $q->where('user_id', auth()->id());
        })->with(['reportes' => function($query) {
            $query->where('user_id', auth()->id());
        }])->get();
    }
}
