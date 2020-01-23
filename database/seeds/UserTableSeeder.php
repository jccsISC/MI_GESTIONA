<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tomamos los roles
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_tutor = Role::where('name', 'tutor')->first();
        $role_orientador = Role::where('name', 'orientador')->first();
        $role_tsocial = Role::where('name', 'tsocial')->first();
        $role_maestro = Role::where('name', 'maestro')->first();
        

        $user = new User();
        $user->name = "User";
        $user->email = "User";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_user);


        $user = new User();
        $user->name = "Admin";
        $user->email = "admin";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);


        $user = new User();
        $user->name = "Julio Cesar Camacho";
        $user->email = "jccs";
        $user->password = bcrypt('jccsisc');
        $user->save();
        //mediante el usuario acede a su metodo roles que es la relacion entre el user y el rol
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Salvador Alcazar Molina";
        $user->email = "salvador";
        $user->password = bcrypt('salvador');
        $user->save();
        $user->roles()->attach($role_tutor);

        $user = new User();
        $user->name = "Brenda Shalala";
        $user->email = "brenda";
        $user->password = bcrypt('brenda');
        $user->save();
        $user->roles()->attach($role_tsocial);

        $user = new User();
        $user->name = "Cesar Rodriguez";
        $user->email = "cesar";
        $user->password = bcrypt('cesar');
        $user->save();
        $user->roles()->attach($role_orientador);

        $user = new User();
        $user->name = "Juan Francisco Ramirez";
        $user->email = "JuanFra";
        $user->password = bcrypt('maestro');
        $user->save();
        $user->roles()->attach($role_maestro);
    }
}
