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
Route::post('becas','BecasController@store');
Route::put('becas/{tblbeca}','BecasController@update');
Route::delete('becas/{tblbeca}','BecasController@destroy');


//DEPENDENCIAS
Route::get('dependencias','DependenciasController@index');
Route::post('dependencias','DependenciasController@store');
Route::put('dependencias/{tbldependencia}','DependenciasController@update');
Route::delete('dependencias/{tbldependencia}','DependenciasController@destroy');

//TRABAJO SOCIAL
Route::get('trabajosocial', 'TrabajoSocialController@alumnos');
Route::get('trabajosocial/{tblalumno}/becas', 'TrabajoSocialController@becas');
Route::get('trabajosocial/{tblalumno}/becas/{tblbeca}', 'TrabajoSocialController@becas');
Route::get('trabajosocial/{tblalumno}/practica', 'TrabajoSocialController@practica');

//ServicioPracticas
Route::resource('servicioPracticas','ServicioPracticasController');
Route::resource('TS','ServicioPracticasController');



// index -> alumnos con mas de 4 justificantes.btn-primary
// alumnosconcuatrojustificantes/


// /alumnos -> todos los alumnos
// vista de justificantes.´lalsdfjsdaljfdlskjklfdsajlsfdajjdasfjfdsajfasdjfdasjfadsjdfslaj´daslfkjlfsdak



//-----------------------------------------DEPARTAMENTO DE SALVADOR--------------------------------------------------
Route::get('T', function(){
    return view('/tutorias.principal');
});

