<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblfamiliare extends Model
{
    protected $table = 'tblfamiliares';
    protected $primaryKey = 'IdFamiliar';
    protected $fillable = ['IdAlumno','Nombre','ApePaterno','ApeMaterno','Tipo','Telefono'];
    public $timestamps = false;

    public function pases() {
        return $this->hasMany(tblpasesalida::class, 'IdFamiliar', 'IdFamiliar');
    }
}
