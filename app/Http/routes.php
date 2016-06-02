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

Route::get('home', function () {
    return view('welcome');
});

Route::group([''],function() {
	Route::resource('docente','DocentesController');
	Route::get('docente/{idDocente}/destroy',[
		'uses' => 'DocentesController@destroy',
		'as' => 'admin.docente.destroy'
		]);
});

Route::group([''],function() {
	Route::resource('planEstudios','PlanEstudiosController');
	Route::get('PlanEstudios/{id}/destroy',[
		'uses' => 'PlanEstudiosController@destroy',
		'as' => 'admin.planEstudios.destroy'
		]);
});

Route::group([''],function() {
	Route::resource('periodoAcademico','PeriodoAcademicoController');
	Route::get('PeriodoAcademico/{id}/destroy',[
		'uses' => 'PeriodoAcademicoController@destroy',
		'as' => 'admin.periodoAcademico.destroy'
		]);
});

Route::group([''],function() {
	Route::resource('grupos','GrupoController');
	Route::get('grupos/{id}/destroy',[
		'uses' => 'GrupoController@destroy',
		'as' => 'admin.grupos.destroy'
		]);
});

Route::group([''],function() {
	Route::resource('espaciosAcademicos','EspaciosAcademicosController');
	Route::get('espaciosAcademicos/{id}/destroy',[
		'uses' => 'EspaciosAcademicosController@destroy',
		'as' => 'admin.espaciosAcademicos.destroy'
		]);
});
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
	$espacios = App\Grupo::where('EspacioAcademico_idEspacioAcademico',$id);
	return $espacios->lists('numeroGrupo', 'idGrupo');
}]);

Route::get('admin/auth/login',[
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'admin.auth.login'
	]);

Route::post('admin/auth/login',[
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'admin.auth.login'
	]);

Route::get('admin/auth/logout',[
	'uses'=>'Auth\AuthController@getLogout',
	'as'=> 'admin.auth.logout'
]);

Route::group([''],function() {
	Route::resource('reporteCompleto','ReporteCompletoController');
});

Route::group([''],function() {
	Route::resource('reporteEspacio','ReporteEspacioAcademicoController');
});

Route::group([''],function() {
	Route::resource('reporteGrupo','ReporteGrupoController');
});

Route::group([''],function() {
	Route::resource('reporteProfesor','ReporteProfesorController');
});

Route::group([''],function() {
	Route::resource('reportePeriodo','ReportePeriodoController');
});

Route::group([''],function() {
	Route::resource('reporteEvaluacion','ReporteEvaluacionController');
});
