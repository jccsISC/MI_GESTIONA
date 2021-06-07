<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblcalificacion extends Model
{
    protected $table = 'tblcalificaciones';
    protected $primaryKey = 'IdCalificacion';
    protected $fillable = ['IdAlumno','Materia','Calificacionfinal','Inasistencias','PorcentajeAsist'
    ,'Extra','Inter','Ordinario','Existe'];
    public $timestamps = false;
    
    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }

    public function detalles() {
        return $this->hasMany(tbldetcalificacion::class, 'IdCalificacion', 'IdCalificacion');
    }
}
