<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// our home route uses the webapps index
Route::get('/', array('as'=>'home', 'uses'=>'WebappsController@index'));

// our Users GET routes
Route::get('logout', array('as'=>'users.logout', 'before'=>'auth', 'uses'=>'UsersController@logout'));

// our Users POST routes
Route::post('login', array('as'=>'users.login','before'=>'csrf', 'uses'=>'UsersController@login'));

// users resource
Route::resource('users', 'UsersController');
	
// users webapps resource
Route::resource('webapps', 'WebappsController');

		// users webapps screenshots resource
		Route::resource('users.webapps.screenshots', 'ScreenshotsController');