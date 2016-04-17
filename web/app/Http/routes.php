<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('index');
});

Route::get('/contact', function () {
  return view('contact');
});

Route::get('/hello/{name}', 'Hello@show');

// Route::get('/hello',function(){
//     return 'Hello World!';
// });


Route::get('hello', 'Hello@index');

//TODO: apus ini klo ga dipake lagi
Route::group(array('prefix' => 'api'), function(){
		Route::resource('json', 'JsonController');
	});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
