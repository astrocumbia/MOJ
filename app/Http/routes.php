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
    return view('auth/login');
});
 



/*
|--------------------------------------------------------------------------
| Paginas con prefijo /contest
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => '/contest'], function()
{
	// seccion administracion de usuarios
	Route::get('/', 'ContestController@show');
 
});



/*
|--------------------------------------------------------------------------
| Paginas que necesitan autenticacion antes de ingresar
|--------------------------------------------------------------------------
|
| Todas las rutas dentro de este grupo necesitan un login antes de acceder
|
*/
Route::group(['middleware' => ['auth'], 'prefix' => '/admin' ], function()
{
	Route::get('/home', function() {
		return view('admin/home');    
	});



	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/user
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/user'], function()
	{
		// seccion administracion de usuarios
		Route::get('/', 'AdminController@showUsers');
	 
	});


	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/contest
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/contest'], function()
	{
		// seccion administracion de usuarios
		Route::get('/', 'AdminController@showContests');
	 
	});	


	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/team
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/team'], function()
	{
		// seccion administracion de usuarios
		Route::get('/', 'AdminController@showTeams');
	 
	});	
	
	
	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/team
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/problem'], function()
	{
		// seccion administracion de usuarios
		Route::get('/', 'AdminController@showProblems');
	 
	});	

});

	
/*
|--------------------------------------------------------------------------
| Paginas con prefijo /auth
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => '/auth'], function()
{
	Route::get('/logout', 'Auth\AuthController@getLogout');

	// Authentication routes...
	Route::get('/login', 'Auth\AuthController@getLogin');
	Route::post('/login', 'Auth\AuthController@postLogin');

	// Registration routes...
	Route::get('/register', 'Auth\AuthController@getRegister');
	Route::post('/register', 'Auth\AuthController@postRegister');
 
});	
