<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblhorariomaestros extends Model
{
    protected $table = 'tblhorariomaestros';
    protected $primaryKey = 'IdHoraMa';
    protected $fillable = ['IdUsuario','Materia','Horas','Carrera','Grupo','Grado','Existe'];
    public $timestamps = false;

    public function inasistencia() {
        return $this->hasOne(tblinasistencias::class, 'IdHoraMa');
    }

    public function detalles(){
        return $this->hasManyThrough(tbldetalleinasistencias::class, tblinasistencias::class);
    }
}
