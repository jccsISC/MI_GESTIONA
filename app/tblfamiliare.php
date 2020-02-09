<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblfamiliare extends Model
{
    protected $table = 'tblfamiliares';
    protected $primaryKey = 'IdFamiliar';
    protected $fillable = ['IdAlumno','NombrePadre','ApePaternoPadre','ApeMaternoPadre','TelefonoPadre','NombreMadre','ApePaternoMadre','ApeMaternoMadre','TelefonoMadre'];
    public $timestamps = false;

    public function pases() {
        return $this->hasMany(tblpasesalida::class, 'IdFamiliar', 'IdFamiliar');
    }

    public function alumno() {
        return $this->belongsTo(tblalumno::class, 'IdAlumno');
    }
}
