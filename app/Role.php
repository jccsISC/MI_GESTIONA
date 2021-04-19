<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    //relacionamos el rol a los usuarios
    public function users() {
        return $this->belongsToMany('App\User', 'role_user', 'user_id', 'role_id');
    }

    protected $fillable = [
        'name', 'description',
    ];
}
