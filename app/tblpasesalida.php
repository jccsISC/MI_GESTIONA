<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblpasesalida extends Model
{
    protected $table = 'tblpasesalidas';
    protected $primaryKey = 'IdPaseSal';
    protected $fillable = ['IdAlumno','Fecha','IdFamiliar','Motivo','Descripcion','Existo'];
    public $timestamps = false;
    public $incrementing = false;
}
