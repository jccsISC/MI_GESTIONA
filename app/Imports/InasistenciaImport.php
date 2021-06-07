<?php

namespace App\Imports;

use App\tblinasistencias;
use Maatwebsite\Excel\Concerns\ToModel;

class InasistenciaImport implements ToModel
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

        return new tblinasistencias([
            'CicloEscolar' => $row[5],
            'IdHoraMa' => $row[6],
            'Existe' => $row[7],
        ]);
    }
}
