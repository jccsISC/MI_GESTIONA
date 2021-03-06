<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblalumno extends Model
{
    protected $table = 'tblalumnos';
    protected $primaryKey = 'IdAlumno';
    protected $fillable = ['IdAlumno','Grado','Grupo','Turno','Carrera','Nombre','ApePaterno','ApeMaterno',
                           'Foto','FechaNacimiento','Curp','Sexo','Etnia','TipoSangre','Email',
                           'Calle','EntreCalle','EntreCalle2','NumExterior','NumInterior','Telefono',
                           'Telefono2','Colonia','CodPostal','Municipio','MunicipioNac','EstadoNac'];
    public $timestamps = false;
    public $incrementing = false;
    
    public function justificantes() {
        return $this->hasMany(tbljustificante::class, 'IdAlumno', 'IdAlumno');
    }

    public function becas() {
        return $this->belongsToMany(tblbeca::class,'tbldetallebecas', 'IdAlumno', 'IdBeca');
    }

    public function practicas() {
        return $this->hasMany(tblserviciopracticas::class, 'IdAlumno', 'IdAlumno');
    }
    
    public function pases() {
        return $this->hasMany(tblpasesalida::class, 'IdAlumno', 'IdAlumno');
    }

    public function familiar() {
        return $this->hasOne(tblfamiliare::class, 'IdAlumno', 'IdAlumno');
    }

    public function calificaciones() {
        return $this->hasMany(tblcalificacion::class, 'IdAlumno','IdAlumno');
    }

    public function inasistencias() {
        return $this->hasMany(tbldetalleinasistencias::class, 'IdAlumno','IdAlumno');
    }

    public function reportes() {
        return $this->hasMany(tblyonoabandono::class, 'IdAlumno','IdAlumno');
    }
    
    public function salud() {
        return $this->hasOne(tblsalud::class, 'IdAlumno','IdAlumno');
    }

    public function incidencias() {
        return $this->hasMany(tblincidencias::class, 'IdAlumno','IdAlumno');
    }
}
