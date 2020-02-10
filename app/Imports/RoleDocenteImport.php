<?php

namespace App\Imports;

use App\Role;
use Maatwebsite\Excel\Concerns\ToModel;

class RoleDocenteImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Role([
            'name'  => $row[0],
            'description'  =>'Docente',
        ]);
    }
}
