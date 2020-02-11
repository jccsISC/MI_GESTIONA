<?php

namespace App\Imports;

use App\roleUser;
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
        return new roleUser([
                'user_id'  => $row[0],
                'role_id'  => 5,           
        ]);
    }
}
