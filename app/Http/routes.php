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

Route::get('/',[
		'uses'=>'HomeController@index',
		'as'=> 'home'
	]);

// Authentication routes...
Route::get('login', [
	'uses'=>'Auth\AuthController@getLogin',
	'as'=>'login'
	]);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', ['uses'=>'Auth\AuthController@getRegister',
	'as'=>'register']);
Route::post('register', 'Auth\AuthController@postRegister');

//confirmation register
Route::get('confirmation/{t}',
	['uses'=>'Auth\AuthController@getConfirmation',
	'as'=>'confirmation']
	);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware'=>'auth'], function(){

	Route::get('account', function(){
		return view('account');
	});
	Route::get('account/password','AccountController@getPassword');
	Route::post('account/password','AccountController@postPassword');

	Route::get('account/edit-profile','AccountController@getProfile');
	Route::post('account/edit-profile','AccountController@postProfile');

	Route::group(['middleware'=>'verified'], function() {
		Route::get('publish', function(){
		return view('publish');
		});
		Route::post('publish', function(){
			return Request::all();
		});
	});
	Route::group(['middleware'=>'role:admin'], function() {
		Route::get('admin/settings', function(){
			return view('admin.settings');
		});	
	});
	Route::group(['middleware'=>'role:editor'], function() {
		Route::get('admin/posts', function(){
			return view('admin.posts');
		});	
	});
	
	
	
});


