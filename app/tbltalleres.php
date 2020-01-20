<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbltalleres extends Model
{
    protected $table = 'tbltalleres';
    protected $primaryKey = 'IdTaller';
    protected $fillable = ['Nombre','Fecha','Responsable','Institucion','Dirigido',
                           'NoBeneficiados','Existe', 'Hora'];
    public $timestamps = false;

    public function grupos() {
        return $this->hasMany(tbldettalleres::class, 'IdTaller','IdTaller');
    }
}
