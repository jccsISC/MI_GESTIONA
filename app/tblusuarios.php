<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblusuarios extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name','email','password'];
    public $timestamps = false;
  
}
