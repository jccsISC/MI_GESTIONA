<?php

namespace App\Imports;

use App\tblhorariomaestros;
use Maatwebsite\Excel\Concerns\ToModel;

class HorarioImport implements ToModel
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

        return new tblhorariomaestros([
            'IdUsuario' => $row[1],
            'Materia' => $row[2],
            'Horas' => $row[3],
            'Turno' => $row[4],
            'Grado' => $row[5],
            'Grupo' => $row[6],
            'Carrera' => $row[7],
            'IdAlumno' => $row[8],
            'Existe' => $row[9],
        ]);
    }
}
