<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldetcalificacion extends Model
{
    protected $table = 'tbldetcalificaciones';
    protected $primaryKey = 'IdDetCalif';
    protected $fillable = ['IdCalificacion','Unidad','Calificacion','Existe'];
    public $timestamps = false;

    public function calificacion() {
        return $this->belongsTo(tblcalificacion::class, 'IdCalificacion');
    }
}
