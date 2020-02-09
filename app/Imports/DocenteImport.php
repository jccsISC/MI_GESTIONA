<?php

namespace App\Imports;

use App\tblhorariomaestros;
use Maatwebsite\Excel\Concerns\ToModel;

class DocenteImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tblhorariomaestros([
            'IdUsuario'  => $row[0],
            'Nombre'  => $row[1],
        ]);
    }
}
