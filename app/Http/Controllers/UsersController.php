<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblusuarios;
use App\Roles;
use App\roleUser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if ($request->ajax()) {
        
    
        $users= tblusuarios::all();
        return $users;
        } else {
            return view('admin');
        }
    }
    public function store(Request $request)
    {

        if ($request->ajax()) {
            
            $atributos = $this->validate($request, [
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]);
    
            return roleUser::create(['user_id' => $atributos['id'],'role_id' => $atributos['role']]) &&
            tblusuarios::create(['id' => $atributos['id'],'name' => $atributos['name'], 'email' => $atributos['email'], 'password' => bcrypt($atributos['password'])]);
            } else {
     return view('admin');
 }
}


    public function update(Request $request, tblusuarios $tblusuarios) {
        $atributos = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);
        
        $tblusuarios->update(['name' => $atributos['name'], 'email' => $atributos['email'], 'password' => bcrypt($atributos['password'])]);
        return $tblusuarios;
    }
        public function destroy(tblusuarios $tblusuarios) {
        
            $tblusuarios->delete();
    
            return response('Usuario Eliminado');
        }
    

    

    
}
