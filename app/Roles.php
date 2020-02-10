<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tblusuarios;

class Roles extends Model
{
    //relacionamos el rol a los usuarios
    public function usuarios() {
        return $this->belongsToMany('App\tblusuarios');
    
    }
}
