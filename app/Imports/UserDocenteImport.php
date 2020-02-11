<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserDocenteImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id'  => $row[0],
            'name'  => $row[1],
            'email'  =>$row[0],
            'password'  =>bcrypt(12345678),  
        ]); 
    }
}
