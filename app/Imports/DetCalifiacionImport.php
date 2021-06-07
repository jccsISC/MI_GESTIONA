<?php

namespace App\Imports;

use App\tbldetcalificacion;
use Maatwebsite\Excel\Concerns\ToModel;

class DetCalifiacionImport implements ToModel
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

        return new tbldetcalificacion([
            'IdCalificacion' => $row[9],
            'Unidad' => $row[10],
            'Calificacion' => $row[11],
            'Existe' => $row[12],
        ]);
    }
}
