<?php
Route::filter('auth.login', function() {
	// if already logged in don't show login page again
	if (Auth::check()) return Redirect::to('auth/login');
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'WelcomeController@index');

	Route::get('home', 'HomeController@index');



	Route::get('/reporting', ['uses' =>'ReportController@index', 'as' => 'Report']);
	Route::post('/reporting', ['uses' =>'ReportController@post']);

	Route::get('/test', function ()    {
		// Uses Auth Middleware
	});



});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

