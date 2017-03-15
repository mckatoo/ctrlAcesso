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

Route::group(['prefix' => 'secretaria','as' => 'secretaria.'], function() {
	Route::get('/', 			['as' => 'index', 		'uses' => 'SecretariaController@index']);
	Route::post('pesquisar', 	['as' => 'pesquisar', 	'uses' => 'SecretariaController@pesquisar']);
	Route::post('salvar', 		['as' => 'salvar', 		'uses' => 'SecretariaController@salvar']);
});

// Route::group(['prefix' => 'usuarios','as' => 'usuarios.'], function() {
//     Route::post('apagar',               ['as' => 'apagar', 'uses' => 'Auth\RegisterController@apagar']);
//     Route::get('update',                ['as' => 'update', 'uses' => 'Auth\RegisterController@update']);
//     Route::post('update',               ['as' => 'update', 'uses' => 'Auth\RegisterController@postUpdate']);
// });