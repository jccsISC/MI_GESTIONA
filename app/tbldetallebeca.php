<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldetallebeca extends Model
{
    protected $table = 'tbldetallebecas';
    protected $primaryKey = 'IdDetalleBeca';
    protected $fillable = ['IdBeca','IdAlumno','Existo'];
    public $timestamps = false;
    
}
