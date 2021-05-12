<?php

namespace App\Imports;

use App\tblcalificacion;
use Maatwebsite\Excel\Concerns\ToModel;

class CalifiacionImport implements ToModel
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

        return new tblcalificacion([
            'IdAlumno' => $row[1],
            'Materia' => $row[2],
            'Calificacionfinal' => $row[3],
            'Inasistencias' => $row[4],
            'PorcentajeAsist' => $row[5],
            'Extra' => $row[6],
            'Inter' => $row[7],
            'Ordinario' => $row[8],
            'Existe' => $row[12],
        ]);
    }
}
