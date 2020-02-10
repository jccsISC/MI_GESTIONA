<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\roleUser;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserDocenteImport;
use App\Imports\RoleDocenteImport;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::whereHas('roles', function($q)
        {
            $q->whereIn('name', ['orientador', 'tutor']);
        
        })->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function importExcelDocente(Request $request){
        $file3= $request->file('filedocente');
        Excel::import(new UserDocenteImport, $file3);
        Excel::import(new RoleDocenteImport, $file3);

        return back()->with('message','Importación de docentes completada');

    }


}
