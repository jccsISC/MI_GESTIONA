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

//Vista principal Trabajo Social
Route::get('TS', function(){
    return view('/trabajosocial.principal');
});


//BECAS
Route::get('becas','BecasController@index');
//Route::post('becas','BecasController@store');
//Route::get('becas/{tblbeca}','BecasController@show');
Route::put('becas/{tblbeca}','BecasController@update');
/*Route::delete('becas/{tblbeca}','BecasController@destroy');*/


//DEPENDENCIAS
Route::get('dependencias','DependenciasController@index');
Route::post('dependencias','DependenciasController@store');
Route::delete('dependencias/{tbldependencia}','DependenciasController@destroy');


//ServicioPracticas
Route::resource('servicioPracticas','ServicioPracticasController');
Route::resource('TS','ServicioPracticasController');






//-----------------------------------------DEPARTAMENTO DE SALVADOR--------------------------------------------------
Route::get('T', function(){
    return view('/tutorias.principal');
});

