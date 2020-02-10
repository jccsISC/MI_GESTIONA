<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['description','role_id','user_id'];
    public $timestamps = false;
    public $incrementing = false;
}
