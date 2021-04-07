<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Roles;
class tblusuarios extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name','email','password'];
    public $timestamps = false;
  
    public function roles() {
        return $this->belongsToMany('App\Roles');
    }

}
