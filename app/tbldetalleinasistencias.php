<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldetalleinasistencias extends Model
{
    protected $table = 'tbldetalleinasistencias';
    protected $primaryKey = 'IdDetInasistencia';
    protected $fillable = ['IdInasistencia','IdAlumno','Fecha','Existe','parcial'];
    public $timestamps = false;

    public function inasistencia() {
        return $this->belongsTo(tblinasistencias::class, 'IdInasistencia');
    }

    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }
}
