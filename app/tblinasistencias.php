<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblinasistencias extends Model
{
    protected $table = 'tblinasistencias';
    protected $primaryKey = 'IdInasistencia';
    protected $fillable = ['CicloEscolar','IdHoraMa','Existe'];
    public $timestamps = false;

    public function horarioMaestro() {
        return $this->belongsTo(tblhorariomaestros::class, 'IdHoraMa');
    }

    public function detalles(){
        return $this->hasMany(tbldetalleinasistencias::class, 'IdInasistencia','IdInasistencia');
    }
}
