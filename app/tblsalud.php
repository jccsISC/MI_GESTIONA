<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblsalud extends Model
{
    protected $table = 'tblsalud';
    protected $primaryKey = 'IdSalud';
    protected $fillable = ['IdAlumno','Estatura','Peso','IMC','Anteojos',
                           'Alergias','DetAlergias','ProbPosturales','DetProbPosturales',
                           'PiePlano','ProbAuditivo','ProbLenguaje','Gravidez','DetGravidez',
                           'ProbBucal','Pediculosis','Transtornos','Otros','DetOtros','Existe'];
    public $timestamps = false;
    

    public function alumno(){
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }
}
