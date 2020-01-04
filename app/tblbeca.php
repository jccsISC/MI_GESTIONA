<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblbeca extends Model
{
    protected $table = 'tblbecas';
    protected $primaryKey = 'IdBeca';
    protected $fillable = ['Nombre','Tipo','Existe'];
    public $timestamps = false;
    public $incrementing = false;
}
