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

Route::auth();

<<<<<<< HEAD:InspWeb/app/Http/routes.php
Route::get('documentation', function () {
    return view('documentation');
});
Route::get('api', function () {
    return view('api');
=======
Route::get('/home', 'HomeController@index');
Route::get('admin/dashboard', 'DashboardController@index');
Route::get('admin/admindash', function () {
		return view('admin.admindash');
>>>>>>> c5144c80a5d555a61c77fcfbbf6a06848cdce4bf:authen/app/Http/routes.php
});