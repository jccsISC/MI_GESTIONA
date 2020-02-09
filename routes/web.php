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

Route::get('/', 'Auth\LoginController@showLoginForm');

//LOGIN
// Route::post('lg', 'Auth\LoginController@login')->name('login');
// Route::get('lg', 'LoginController@showLoginForm')->name('login');
// Route::get('lg', function () {
//     return view('login');
// });


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


//-----------------------------------------DEPARTAMENTO DE BRENDA----------------------------------------------------

//Vista principal Trabajo Social
Route::get('TS', function(Illuminate\Http\Request $request) {
    $request->user()->authorizeRoles(['tsocial']);
    return view('/trabajosocial.principal');
});


//BECAS CRUD
Route::get('becas','BecasController@index');
Route::post('becas','BecasController@store');
Route::put('becas/{tblbeca}','BecasController@update');
Route::delete('becas/{tblbeca}','BecasController@destroy');


//JUSTIFICANTES CRUD
Route::get('justificantes', 'JustificantesController@index');
Route::post('justificantes', 'JustificantesController@store');
Route::delete('justificantes/{tbljustificante}', 'JustificantesController@destroy');
Route::name('imprimirJ')->get('imprimirJust','JustificantesController@imprimirJ');
Route::name('imprimirP')->get('imprimirPase','JustificantesController@imprimirP');
//PASES
Route::delete('pases/{tblpasesalida}', 'PaseDeSalidaController@destroy');
//PRACTICAS
Route::delete('practicas/{tblserviciopracticas}', 'ServicioPracticasController@destroy');


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
Route::post('trabajosocial/{tblalumno}/pases', 'TrabajoSocialController@agregarPase');
Route::post('trabajosocial/{tblalumno}/justificantes', 'TrabajoSocialController@agregarJustificante');
Route::delete('/justificantes/{{tbljustificante}}', 'TrabajoSocialController@eliminarJustiPase');


//ServicioPracticas
Route::resource('servicioPracticas','ServicioPracticasController');
// Route::resource('TS','ServicioPracticasController');

//ALUMNOS
Route::get('alumnos/buscar', 'AlumnoController@buscar');
Route::get('alumnos/{tblalumno}/familiares', 'AlumnoController@familiares');
Route::get('alumnos/{tblalumno}/calificaciones', 'AlumnoController@calificaciones');
Route::get('tutorias/reprobados', 'TutoriasController@reprobados');
Route::get('tutorias/inasistencias', 'TutoriasController@inasistencias');
Route::get('tutorias/{tblalumno}/inasistencias', 'TutoriasController@faltasSemana');
//REPORTE YO NO ABANDONO
Route::get('yonoAbandono', 'YonoAbandonoController@index');
Route::post('yonoAbandono', 'YonoAbandonoController@store');
Route::put('yonoAbandono/{tblyonoabandono}', 'YonoAbandonoController@update');
Route::get('users', 'UserController@index');


//ORIENTACION E
Route::get('orientacion','OrientacionEController@reportes');
Route::post('salud','SaludController@store');
Route::put('salud/{tblsalud}','SaludController@update');
Route::get('salud/{tblalumno}', 'SaludController@salud');
//TALLERES
Route::get('talleres', 'TalleresController@index');
Route::get('talleres/grupos', 'TalleresController@grupos');
Route::post('talleres', 'TalleresController@store');
Route::delete('talleres/{tbltalleres}', 'TalleresController@destroy');
Route::put('talleres/{tbltalleres}', 'TalleresController@update');
//INCIDENCIAS
Route::get('incidencias', 'IncidenciasController@index');
Route::get('incidencias/{tblalumno}', 'IncidenciasController@incidencias');
Route::post('incidencias', 'IncidenciasController@store');
Route::put('incidencias/{tblincidencias}', 'IncidenciasController@update');
Route::post('incidenciareal', 'IncidenciasController@reporteIncidencia');
Route::put('incidenciareal/{tblincidencias}', 'IncidenciasController@editarIncidencia');



//INASISTENCIAS MAESTROS
Route::get('M', function(Illuminate\Http\Request $request) {
    $request->user()->authorizeRoles(['maestro']);
    return view('/inasistencias');
});
//INASISTENCIAS MAESTROS
Route::get('faltas/{tblalumno}', 'FaltasController@faltas');

//REPORTES GENERALES
Route::get('R', function(){
    return view('/reportes');
});
//-----------------------------------------DEPARTAMENTO DE SALVADOR--------------------------------------------------
Route::get('T', function(Illuminate\Http\Request $request) {
    $request->user()->authorizeRoles(['tutor']);
    return view('/tutorias.principal');
});



//CESAR-----------------------------------------------------------------------------------------------------------
Route::get('OE', function(Illuminate\Http\Request $request) {
    $request->user()->authorizeRoles(['orientador']);
    return view('/orientacion.principal');
});


//ADMINISTRADOR-----------------------------------------------------------------------------------------------------------
Route::get('A', function(Illuminate\Http\Request $request) {
    $request->user()->authorizeRoles(['admin']);
    return view('/admin');
});