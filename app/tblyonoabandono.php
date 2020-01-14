<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblyonoabandono extends Model
{
    protected $table = 'tblyonoabandono';
    protected $primaryKey = 'IdYonoabandono';
    protected $fillable = ['IdAlumno','FechaInicio','FechaFin','Nombrequienderiva','IdFamiliar','Motivo'
    ,'Derivacion','DescripcionDer','Status','Seguimiento','Observaciones','ResponsableSeguimiento','Existe'];
    public $timestamps = false;

}
