<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblalumno extends Model
{
    protected $table = 'tblalumnos';
    protected $primaryKey = 'IdAlumno';
    protected $fillable = ['Grado','Grupo','Turno','Carrera','Nombre','ApePaterno','ApeMaterno',
                           'Foto','FechaNacimiento','Curp','Sexo','Etnia','TipoSangre','Email',
                           'Calle','EntreCalle','EntreCalle2','NumExterior','NumInterior','Telefono',
                           'Telefono2','Colonia','CodPostal','Municipio','Estado','MunicipioNac','EstadoNac'];
    public $timestamps = false;
    public $incrementing = false;
    
    public function justificantes() {
        return $this->hasMany(tbljustificante::class, 'IdAlumno', 'IdAlumno');
    }

    public function becas(){
        return $this->belongsToMany(tblbeca::class,'tbldetallebecas', 'IdAlumno', 'IdBeca');
    }

    public function practicas() {
        return $this->hasMany(tblserviciopracticas::class, 'IdAlumno', 'IdAlumno');
    }
    

    // alumnos -> practica -> dependecia


    
}
