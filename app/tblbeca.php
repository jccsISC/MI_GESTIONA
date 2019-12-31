<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblbeca extends Model
{
    protected $table = 'tblbecas';
    protected $primaykey = 'IdBeca';
    protected $fillable = ['Nombre','Tipo','Existe'];
    public $timestamps = false;

    

}
