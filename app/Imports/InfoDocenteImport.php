<?php

namespace App\Imports;

use App\tblhorariomaestros;
use Maatwebsite\Excel\Concerns\ToModel;

class InfoDocenteImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tblhorariomaestros([
            'IdUsuario'  => $row[],
            'Materia'  => $row[2],
            'Horas'  => $row[5],
            'Turno'  => $row[4],
            'GradoGrupo'  => $row[3],
            'Existe'  => 1,
        ]);
    }
}
