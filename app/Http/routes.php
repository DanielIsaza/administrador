<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;
/**
Rutas que dirigen a la pagina de inicio
*/
Route::get('/', function () {
    return view('welcome');
});
/**
* Ruta que dirige a la pagina de inicio 
*/
Route::get('home', function () {
    return view('welcome');
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de docente
*/
Route::group([''],function() {
	Route::resource('docente','DocentesController');
	Route::get('docente/{idDocente}/destroy',[
		'uses' => 'DocentesController@destroy',
		'as' => 'admin.docente.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de plan de estudios
*/
Route::group([''],function() {
	Route::resource('planEstudios','PlanEstudiosController');
	Route::get('PlanEstudios/{id}/destroy',[
		'uses' => 'PlanEstudiosController@destroy',
		'as' => 'admin.planEstudios.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de periodo academico
*/
Route::group([''],function() {
	Route::resource('periodoAcademico','PeriodoAcademicoController');
	Route::get('PeriodoAcademico/{id}/destroy',[
		'uses' => 'PeriodoAcademicoController@destroy',
		'as' => 'admin.periodoAcademico.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de acta de socialización
*/
Route::group([''],function() {
	Route::resource('actaSocializacion','ActaSocializacionController');
	Route::get('actaSocializacion/{id}/destroy',[
		'uses' => 'ActaSocializacionController@destroy',
		'as' => 'admin.actaSocializacion.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de acta de concertacion 
*/
Route::group([''],function() {
	Route::resource('actaConcertacion','ActaConcertacionController');
	Route::get('actaConcertacion/{id}/destroy',[
		'uses' => 'ActaConcertacionController@destroy',
		'as' => 'admin.actaConcertacion.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de grupos
*/
Route::group([''],function() {
	Route::resource('grupos','GrupoController');
	Route::get('grupos/{id}/destroy',[
		'uses' => 'GrupoController@destroy',
		'as' => 'admin.grupos.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de espacios academicos
*/
Route::group([''],function() {
	Route::resource('espaciosAcademicos','EspaciosAcademicosController');
	Route::get('espaciosAcademicos/{id}/destroy',[
		'uses' => 'EspaciosAcademicosController@destroy',
		'as' => 'admin.espaciosAcademicos.destroy'
		]);
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador que activa y desactiva las actas
*/
Route::group([''], function(){
	Route::resource('activar','ActaMostrarController');
});
/**
* Toma el id de un plan de estudios y retorna los semestres de este
*/
Route::get('dropdown', ['as'=>'dropdown', function(){
	$id = Input::get('option');
	$semestre = App\Semestre::where('PlanEstudio_idPlanEstudio',$id);
	return $semestre->lists('nombreSemestre', 'idSemestre');
}]);
/**
*Toma el id de un semestre y retorna los espacios academicos de este
*/
Route::get('lista', ['as'=>'lista', function(){
	$id = Input::get('semestre');
	$espacios = App\EspacioAcademico::where('Semestre_idSemestre',$id);
	return $espacios->lists('nombre', 'idEspacioAcademico','Semestre_idSemestre');
}]);
/**
*Toma el id de un espacio academico y retorna los grupos creados 
*/
Route::get('grupo', ['as'=>'grupo', function(){
	$id = Input::get('espacio');
	
	$espacios = App\Grupo::leftJoin('actaconcertacion','idGrupo','=','Grupo_idGrupo')->where('EspacioAcademico_idEspacioAcademico',$id)->Where(function ($query){
		$periodo =  App\PeriodoAcademico::select('id')->get()->max('id');
		$query->whereNull('idActaConcertacion')->orWhere('periodoAcademico_idPeriodo',$periodo);})->orderBy('numeroGrupo','ASC');
	return $espacios->lists('numeroGrupo', 'idGrupo');
}]);
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador que controla el ingreso de usuarios
*/
Route::get('admin/auth/login',[
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'admin.auth.login'
	]);
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador que define las fuciones a realizar despues
* de que un usuario ingrese
*/
Route::post('admin/auth/login',[
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'admin.auth.login'
	]);
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador que define las funciones a realizar 
* cuando un usuario cierre la sesion en la aplicacion 
*/
Route::get('admin/auth/logout',[
	'uses'=>'Auth\AuthController@getLogout',
	'as'=> 'admin.auth.logout'
]);
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de reporte del programa
*/
Route::group([''],function() {
	Route::resource('reporteCompleto','ReporteCompletoController');
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de reporte por espacio academico
*/
Route::group([''],function() {
	Route::resource('reporteEspacio','ReporteEspacioAcademicoController');
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de reporte por grupo
*/
Route::group([''],function() {
	Route::resource('reporteGrupo','ReporteGrupoController');
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de reporte por profesor
*/
Route::group([''],function() {
	Route::resource('reporteProfesor','ReporteProfesorController');
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de reporte por periodo academico
*/
Route::group([''],function() {
	Route::resource('reportePeriodo','ReportePeriodoController');
});
/**
* Rutas que representan el acceso a las funciones definidas 
* para el controlador de reporte de evaluacion
*/
Route::group([''],function() {
	Route::resource('reporteEvaluacion','ReporteEvaluacionController');
});