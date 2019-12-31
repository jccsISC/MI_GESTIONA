<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblserviciopracticas extends Model
{
    protected $table = 'tblserviciopracticas';
    protected $primaykey = 'IdServPrac';
    protected $fillable = ['IdAlumno','Tipo','IdDependencias','FechaInicio','FechaFin','Existe'];
    public $timestamps = false;
}
