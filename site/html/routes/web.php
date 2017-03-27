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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('importar', ['as' => 'importar', 'uses' => 'HomeController@importar']);

Route::post('user/update', ['as' => 'updateUser', 'uses' => 'HomeController@updateUser']);

Route::group(['prefix' => 'secretaria','as' => 'secretaria.'], function() {
	Route::get('/', 			['as' => 'index', 			'uses' => 'SecretariaController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 		'uses' => 'SecretariaController@pesquisar']);
	Route::get('configuracoes', ['as' => 'configuracoes', 	'uses' => 'SecretariaController@configuracoes']);
});

Route::group(['prefix' => 'aluno','as' => 'aluno.'], function() {
	Route::get('/', 			['as' => 'index', 		'uses' => 'AlunoController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 	'uses' => 'AlunoController@pesquisar']);
	Route::post('salvar', 		['as' => 'salvar', 		'uses' => 'AlunoController@salvar']);
	Route::post('apagar', 		['as' => 'apagar', 		'uses' => 'AlunoController@apagar']);
});

Route::group(['prefix' => 'campus','as' => 'campus.'], function() {
	Route::get('/', 			['as' => 'index', 		'uses' => 'CampusController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 	'uses' => 'CampusController@pesquisar']);
	Route::post('salvar', 		['as' => 'salvar', 		'uses' => 'CampusController@salvar']);
	Route::post('apagar', 		['as' => 'apagar', 		'uses' => 'CampusController@apagar']);
});

Route::group(['prefix' => 'curso','as' => 'curso.'], function() {
	Route::get('/', 			['as' => 'index', 		'uses' => 'CursoController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 	'uses' => 'CursoController@pesquisar']);
	Route::post('salvar', 		['as' => 'salvar', 		'uses' => 'CursoController@salvar']);
	Route::post('apagar', 		['as' => 'apagar', 		'uses' => 'CursoController@apagar']);
});

Route::group(['prefix' => 'turma','as' => 'turma.'], function() {
	Route::get('/', 			['as' => 'index', 		'uses' => 'TurmaController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 	'uses' => 'TurmaController@pesquisar']);
	Route::post('salvar', 		['as' => 'salvar', 		'uses' => 'TurmaController@salvar']);
	Route::post('apagar', 		['as' => 'apagar', 		'uses' => 'TurmaController@apagar']);
});

Route::group(['prefix' => 'controle','as' => 'controle.'], function() {
	Route::get('/', 			['as' => 'index', 		'uses' => 'ControleController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 	'uses' => 'ControleController@pesquisar']);
	Route::post('liberar',		['as' => 'liberar', 	'uses' => 'ControleController@liberar']);
});