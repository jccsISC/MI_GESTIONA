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
        return $this->belongsToMany('App\Roles', 'role_user', 'user_id', 'role_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
