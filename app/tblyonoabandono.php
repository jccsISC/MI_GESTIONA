<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblyonoabandono extends Model
{
    protected $table = 'tblyonoabandono';
    protected $primaryKey = 'IdYonoabandono';
    protected $fillable = ['IdAlumno','FechaInicio','FechaFin','Nombrequienderiva','IdFamiliar','Motivo'
    ,'Derivacion','DescripcionDer','Status','Seguimiento','Observaciones','ResponsableSeguimiento','Existe', 'user_id'];
    public $timestamps = false;

    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }
    
    public function familiar() {
        return $this->belongsTo(tblfamiliare::class, 'IdFamiliar');
    }

    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
