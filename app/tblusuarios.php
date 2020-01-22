<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblusuarios extends Model
{
    protected $table = 'tblusuarios';
    protected $primaryKey = 'IdUsuario';
    protected $fillable = ['Nombre','Usuario','Contra','Tipo','Existe'];
    public $timestamps = false;
}
