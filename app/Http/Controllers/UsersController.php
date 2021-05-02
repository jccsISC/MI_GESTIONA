<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    public function buscar(Request $request) {
        $buscar = $request->query('buscar');
        $query = tblusuarios::where('id', $buscar);
        if ($request->query('opciones')) {
            $query->orWhere('name', 'LIKE', '%'.$buscar.'%');
        } else {
            $query->orWhere('name', $buscar);
        }
        
        return $request->query('opciones') ? $query->limit(8)->get() : $query->first();
    }
    public function index(Request $request) {

        if ($request->ajax()) {
        $users= tblusuarios::with('roles')->get();
       // $users= tblusuarios::all();

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

            $atributos['name'] = strtoupper($atributos['name']);

            roleUser::create(['user_id' => $atributos['id'],'role_id' => $atributos['role']]);
            tblusuarios::create(['id' => $atributos['id'],'name' => $atributos['name'], 'email' => $atributos['email'], 'password' => bcrypt($atributos['password'])]);

            return tblusuarios::find($atributos['id'])->load('roles');
            } else {
     return view('admin');
 }
}


    public function update(Request $request, tblusuarios $tblusuarios) {
        $actualizarPassword = $request->input('actualizar_password');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $validator->sometimes('password', 'required', function ($input) {
            return $input->actualizar_password;
        });

        $validator->validate();

        $atributos = $validator->validated();
        $atributos['name'] = strtoupper($atributos['name']);
        $data = ['name' => $atributos['name'], 'email' => $atributos['email']];
        if ($actualizarPassword) {
            $data['password'] = bcrypt($atributos['password']);
        }
        
        $tblusuarios->update($data);

        if ($tblusuarios->role != $atributos['role']) {
            $tblusuarios->roles()->detach();
            $tblusuarios->roles()->attach($atributos['role']);
        }
        
        return $tblusuarios->load('roles');
    }
        public function destroy($id) {
        
        $usuario= tblusuarios::find($id);
        $roleusu = roleUser::where('user_id', $id);
        $usuario->delete();
        $roleusu->delete();
    
       
        }
    

  

    
}
