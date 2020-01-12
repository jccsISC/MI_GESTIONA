<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblpasesalida extends Model
{
    protected $table = 'tblpasesalidas';
    protected $primaryKey = 'IdPaseSal';
    protected $fillable = ['IdAlumno','Fecha','IdFamiliar','Motivo','Descripcion','Existe'];
    public $timestamps = false;
    
    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }


    public function familiar() {
        return $this->belongsTo(tblfamiliare::class,'IdFamiliar');
    }
}
