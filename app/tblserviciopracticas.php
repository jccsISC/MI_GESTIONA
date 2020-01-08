<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblserviciopracticas extends Model
{
    protected $table = 'tblserviciopracticas';
    protected $primaykey = 'IdServPrac';
    protected $fillable = ['IdAlumno','Tipo','IdDependencias','FechaInicio','FechaFin','Existe'];
    public $timestamps = false;

    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }


    public function dependencia(){
        return $this->belongsTo(tbldependencia::class,'IdDependencias');
    }

    // alumno
    // id
    // has one practica

    // practica
    // id
    // alumno_id
    // dependencia_id
    // belongs to dependencia
    // belongs to alumno

    // dependencia
    // id
    // has many practicas


    
}
