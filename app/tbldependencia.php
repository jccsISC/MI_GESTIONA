<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldependencia extends Model
{
    protected $table = 'tbldependencias';
    protected $primaryKey = 'IdDependencia';
    protected $fillable = ['Nombre','Deireccion','Giro','Telefono','Responsable','TipoVinculacion','Existe'];
    public $timestamps = false;
    public $incrementing = false;
}
