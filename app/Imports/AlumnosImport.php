<?php

namespace App\Imports;

use App\tblalumno;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[4])) {
            return null;
        }

        return new tblalumno([
            'Grado'                => $row[0],
            'Grupo'                => $row[2],
            'Turno'                => $row[3],
            'Carrera'              => $row[54],
            'IdAlumno'             => $row[4],
            'ApePaterno'           => $row[5],
            'ApeMaterno'           => $row[6],
            'Nombre'               => $row[7],
            'Foto'                 => $row[57],
            'FechaNacimiento'      => $row[9],
            'Curp'                 => $row[10],
            'Sexo'                 => $row[11],
            'Etnia'                => $row[24],
            'TipoSangre'           => $row[26],
            'Email'                => $row[23],
            'Calle'                => $row[12],
            'EntreCalle'           => $row[13],
            'EntreCalle2'          => $row[14],
            'NumExterior'          => $row[15],
            'NumInterior'          => $row[16],
            'Telefono'             => $row[18],
            'Telefono2'            => $row[19],
            'Colonia'              => $row[27],
            'CodPostal'            => $row[28],
            'Municipio'            => $row[29],
            'MunicipioNac'         => $row[55],
            'EstadoNac'            => $row[56],
            
        ]);
    }
}
