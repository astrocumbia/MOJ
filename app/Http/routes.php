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
	Route::get('/', 'ContestController@showProblemas');

	//
	Route::get('/problemas', 'ContestController@showProblemas');

	Route::get('/envios', 'ContestController@showEnvios');

	Route::get('/clarificaciones', 'ContestController@showClarificaciones');

	Route::get('/score', 'ContestController@showScore');
 
});


Route::get('/files/{name}','ProblemController@showDescriptionget');

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
		Route::post('/add', 'AdminController@addUser');
		Route::post('/load', 'AdminController@loadUser');
		Route::post('/edit', 'AdminController@editUser');
		Route::post('/delete', 'AdminController@deleteUser');

	});


	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/contest
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/contest'], function()
	{
		// seccion administracion de concursos
		Route::get('/', 'AdminController@showContests');
		Route::post('/save', 'AdminController@saveContests');
		Route::post('/load', 'AdminController@loadContest');
		Route::post('/edit', 'AdminController@editContest');
		Route::get('/del/{id}', 'AdminController@deleteContest');
	});	


	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/team
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/team'], function()
	{
		// seccion administracion de equipos
		Route::get('/', 'AdminController@showTeams');
		Route::post('/add', 'AdminController@addTeams');
		Route::post('/load', 'AdminController@loadTeams');
	 	Route::post('/edit', 'AdminController@editTeams');
	 	Route::get('/del/{id}', 'AdminController@deleteTeam');

	});	
	
	
	/*
	|--------------------------------------------------------------------------
	| Paginas con prefijo /admin/problem
	|--------------------------------------------------------------------------
	|
	*/
	Route::group(['prefix' => '/problem'], function()
	{
		// seccion administracion de usuarios
		Route::get('/', 'ProblemController@showProblems');
		Route::post('/showDescription/', 'ProblemController@showDescription');
		Route::post('/downloadFile/', 'ProblemController@downloadFile');
		Route::post('/add', 'ProblemController@addProblems');
		Route::post('/load', 'ProblemController@loadProblem');
		Route::post('/edit', 'ProblemController@editProblem');
		Route::post('/delete', 'ProblemController@deleteProblem');
	 
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
