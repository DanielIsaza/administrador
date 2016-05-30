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
	Route::resource('espaciosAcademicos','EspaciosAcademicosController');
	Route::get('EspaciosAcademicos/{id}/destroy',[
		'uses' => 'EspaciosAcademicosController@destroy',
		'as' => 'admin.espaciosAcademicos.destroy'
		]);
});

Route::get('dropdown', ['as'=>'dropdown', function(){
	$id = Input::get('option');
	$semestre = App\Semestre::where('PlanEstudio_idPlanEstudio',$id);
	return $semestre->lists('nombreSemestre', 'idSemestre');
}]);

Route::get('lista', ['as'=>'lista', function(){
	$id = Input::get('semestre');
	$espacios = App\EspacioAcademico::where('Semestre_idSemestre',$id);
	return $espacios->lists('idEspacioAcademico', 'nombre','Semestre_idSemestre');
}]);

//Route::get('lista/{semestre}',['as'=>'lista','uses'=>'EspaciosAcademicosController@lista']);

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