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
Route::get('listaBecas', function(){
    return view('/trabajosocial.listaBecas');
});



//BECAS CRUD
Route::get('becas','BecasController@index');
Route::post('becas','BecasController@store');
Route::put('becas/{tblbeca}','BecasController@update');
Route::delete('becas/{tblbeca}','BecasController@destroy');

Route::delete('practicas/{tblserviciopractica}','BecasController@destroy');

//JUSTIFICANTES CRUD
Route::get('justificantes', 'JustificantesController@index');
Route::get('justificantes', 'JustificantesController@store');
Route::get('justificantes/{tbljustificante}', 'JustificantesController@update');
Route::get('justificantes/{tbljustificante}', 'JustificantesController@destroy');


//DEPENDENCIAS CRUD
Route::get('dependencias','DependenciasController@index');
Route::post('dependencias','DependenciasController@store');
Route::put('dependencias/{tbldependencia}','DependenciasController@update');
Route::delete('dependencias/{tbldependencia}','DependenciasController@destroy');

//TRABAJO SOCIAL
Route::get('trabajosocial', 'TrabajoSocialController@alumnos');
Route::get('trabajosocial/{tblalumno}/becas', 'TrabajoSocialController@becas');
Route::post('trabajosocial/{tblalumno}/becas/{tblbeca}', 'TrabajoSocialController@agregarBeca');
Route::delete('trabajosocial/{tblalumno}/becas/{tblbeca}', 'TrabajoSocialController@eliminarBecaAl');
Route::get('trabajosocial/{tblalumno}/practica', 'TrabajoSocialController@practica');
Route::post('trabajosocial/{tblalumno}/practica', 'TrabajoSocialController@agregarPractica');
Route::get('trabajosocial/{tblalumno}/pases', 'TrabajoSocialController@pases');
Route::get('trabajosocial/{tblalumno}/justificantes', 'TrabajoSocialController@justificantes');


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

