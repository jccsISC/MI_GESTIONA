<?php

namespace App\Imports;

use App\tbldetalleinasistencias;
use Maatwebsite\Excel\Concerns\ToModel;

class DetInasistenciaImport implements ToModel
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

        return new tbldetalleinasistencias([
            'IdInasistencia' => $row[1],
            'IdAlumno' => $row[2],
            'Fecha' => $row[3],
            'parcial' => $row[4],
            'Existe' => $row[7],
        ]);
    }
}
