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
    return view('dashboard');
});

Route::get('/documentation', function () {
    return view('document.index');
});
Route::resource('location','LocationController');
Route::resource('media','MediaController');
Route::resource('location_media','LocationMediaController');
Route::auth();

Route::get('/home', 'HomeController@index');

// route to show the login form
//Route::get('/aa', array('uses' => 'HomeController@showLogin'));

// route to process the form
//Route::post('/login', array('uses' => 'HomeController@doLogin'));

//Route::get('/logout', array('uses' => 'HomeController@doLogout'));

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
