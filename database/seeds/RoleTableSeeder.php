<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //comenzamos con la creacion de roles
        $role = new Role();
        $role->name  = "admin";
        $role->description = "Administrador";
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->description = "User";
        $role->save();

        $role = new Role();
        $role->name = "tutor";
        $role->description = "Tutorias";
        $role->save();

        $role = new Role();
        $role->name = "orientador";
        $role->description = "OrientacionE";
        $role->save();

        $role = new Role();
        $role->name = "tsocial";
        $role->description = "TrabajoSocial";
        $role->save();

        $role = new Role();
        $role->name = "maestro";
        $role->description = "Maestros";
        $role->save();

    }
}
