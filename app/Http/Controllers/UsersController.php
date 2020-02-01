<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if ($request->ajax()) {
            return User::all();
        } else {
            return view('admin');
        }
    }

    /*if ($request->ajax()) {

            $usuarios = tblusuarios::join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('role_user' , 'role_user.role_id','=','roles.id')
                ->select(
                    
                    'roles.tipo as TipoUs',
                    'users.id',
                    'users.name',
                    'users.email'

                );
           return[ 'usuario'=>$usuarios];
        } else {
            return view('home');
        } */
}
