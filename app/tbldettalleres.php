<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldettalleres extends Model
{
    protected $table = 'tbldettalleres';
    protected $primaryKey = 'IdDetTaller';
    protected $fillable = ['Semestre','Grupo','IdTaller','Cantidad'];
    public $timestamps = false;


    
    public function taller() {
        return $this->belongsTo(tbltalleres::class, 'IdTaller');
    }
}
