<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblincidencias extends Model
{
    protected $table = 'tblincidencias';
    protected $primaryKey = 'IdIncidencia';
    protected $fillable = ['IdAlumno','FechaInicio','FechaFin','IdFamiliar',
    'DescripcionReporte','Comentarios','TipoFalta','Status','ComentariosPa',
    'Observaciones', 'Derivacion', 'ResponsableSeguimiento', 'Existe', 'TipoReporte'];
    public $timestamps = false;

    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }

    public function familiar() {
        return $this->belongsTo(tblfamiliare::class, 'IdFamiliar');
    }

    
}
