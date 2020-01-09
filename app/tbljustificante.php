<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbljustificante extends Model
{
    protected $table = 'tbljustificantes';
    protected $primaryKey = 'IdJustificante';
    protected $fillable = ['IdAlumno','Fecha','FechaInicio','FechaFin','Motivo','Existo'];
    public $timestamps = false;

    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }
}
