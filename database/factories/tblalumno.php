<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\tblalumno;
use Faker\Generator as Faker;

$factory->define(tblalumno::class, function (Faker $faker) {
    return [
        'IdAlumno' => $faker->randomDigit(),
            'Grado' => '1',
            'Grupo' => 'A',
            'Turno' => 'M',
            'Carrera' => 'Biotecnología',
            'Nombre' => $faker->name(),
            'ApePaterno' => $faker->lastName(),
            'ApeMaterno' => $faker->lastName(),
            'Foto' => 'foto',
            'FechaNacimiento' => '1995-06-26',
            'Curp' => 'CASJ950626HMNMLL09',
            'Sexo' => 'M',
            'Etnia' => 'No',
            'TipoSangre' => 'O+',
            'EMAIL' => $faker->email(),
            'Calle' => 'San Salvador',
            'EntreCalle' => '',
            'EntreCalle2' => '',
            'NumExterior' => '45',
            'NumInterior' => '',
            'Telefono' => '4531260729',
            'Telefono2' => '',
            'Colonia' => 'Hollywood',
            'CodPostal' => '63735',
            'Municipio' => 'Bahía de Banderas',
            'Estado' => 'Jalisco',
            'MunicipioNac' => 'Apatzingán',
            'EstadoNac' => 'Michoacán'
    ];
});
