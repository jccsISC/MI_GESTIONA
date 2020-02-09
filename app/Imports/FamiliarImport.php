<?php

namespace App\Imports;

use App\tblfamiliare;
use Maatwebsite\Excel\Concerns\ToModel;

class FamiliarImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tblfamiliare([
            'IdAlumno'  => $row[4],
            'NombrePadre'  => $row[46],
            'ApePaternoPadre'  => $row[44],
            'ApeMaternoPadre'  => $row[45],
            'TelefonoPadre'  => $row[47],
            'NombreMadre'  => $row[50],
            'ApePaternoMadre'  => $row[48],
            'ApeMaternoMadre'  => $row[49],
            'TelefonoMadre'  => $row[51],
        ]);
    }
}
