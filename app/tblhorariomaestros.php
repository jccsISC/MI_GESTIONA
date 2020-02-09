<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblhorariomaestros extends Model
{
    protected $table = 'tblhorariomaestros';
    protected $primaryKey = 'IdHoraMa';
    protected $fillable = ['IdUsuario','Materia','Horas','Carrera','Grupo','Grado','Existe'];
    public $timestamps = false;

    public function usuarioMaestro() {
        return $this->belongsTo('App\User', 'IdUsuario');
    }

    public function inasistencia() {
        return $this->hasOne(tblinasistencias::class, 'IdHoraMa');
    }
}
