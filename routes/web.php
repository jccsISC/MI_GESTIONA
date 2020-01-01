<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//-----------------------------------------DEPARTAMENTO DE BRENDA----------------------------------------------------
/*Route::get('/name/{name}/lastname/{lastname?}', function($name,$lastname=null){
    return 'Hola '.$name.' '.$lastname;
});
//ruta de prueba recibiendo un parametro opcional
Route::get('prueba/{name?}','PruebaController@prueba');*/

//Vista principal Trabajo Social
Route::get('TS', function(){
    return view('/trabajosocial.principal');
});


//BECAS
Route::get('becas','BecasController@index');
//Route::post('becas','BecasController@post');
//Route::get('becas/{tblbeca}','BecasController@show');
Route::put('becas/{tblbeca}','BecasController@update');
Route::delete('becas/{tblbeca}','BecasController@destroy');
// Route::post('trainers/{trainer}/pokemons','PokemonController@store')








//-----------------------------------------DEPARTAMENTO DE SALVADOR--------------------------------------------------
Route::get('T', function(){
    return view('/tutorias.principal');
});

