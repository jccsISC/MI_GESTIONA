<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldependencia extends Model
{
    protected $table = 'tbldependencias';
    protected $primaryKey = 'IdDependencia';
    protected $fillable = ['Nombre','Direccion','Giro','Telefono','Responsable','TipoVinculacion','Existe'];
    public $timestamps = false;

    public function practicas() {
        return $this->hasMany(tblserviciopracticas::class, 'IdDependencias', 'IdDependencia');
    }

}
