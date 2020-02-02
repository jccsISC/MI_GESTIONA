<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //Para referirnos a esta clase como DB utilizamos el facade de laravel

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //una vez creado el seeder lo registramos en DataBaseSeeder
        DB::table('tblalumnos')->insert([
            'IdAlumno' => '17021910',
            'Grado' => '1',
            'Grupo' => 'A',
            'Turno' => 'M',
            'Carrera' => 'Biotecnología',
            'Nombre' => 'Julio Cesar',
            'ApePaterno' => 'Camacho',
            'ApeMaterno' => 'Silva',
            'Foto' => 'foto',
            'FechaNacimiento' => '1995-06-26',
            'Curp' => 'CASJ950626HMNMLL09',
            'Sexo' => 'M',
            'Etnia' => 'No',
            'TipoSangre' => 'O+',
            'EMAIL' => 'silva.jc@hotmail.com',
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
        ]);
    }
}
