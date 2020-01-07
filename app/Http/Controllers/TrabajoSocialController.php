<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblalumno;

class TrabajoSocialController extends Controller
{
    
    public function alumnos() {
        return tblalumno::has('justificantes', '>', 3)->with('justificantes')->get();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\tblalumno
     * @return \Illuminate\Http\Response
     */
    public function becas(tblalumno $tblalumno) 
    {   //ver los cambios que me pidió kevin en la ultima llamada hay una foto
        return $tblalumno->becas;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
