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

Route::get('/', function () {
    return view('welcome');
});





/*
|--------------------------------------------------------------------------
| Paginas que necesitan autenticacion antes de ingresar
|--------------------------------------------------------------------------
|
| Todas las rutas dentro de este grupo necesitan un login antes de acceder
|
*/
Route::group(['middleware' => ['auth']], function()
{
	Route::get('/home', function() {
		return view('home');    
	});

	Route::get('auth/logout', 'Auth\AuthController@getLogout');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
