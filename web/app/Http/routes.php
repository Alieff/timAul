<?php
use App\Quotes;
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
	return view('home');
});

Route::get('/hello/{name}', 'Hello@show');

// Route::get('/hello',function(){
//     return 'Hello World!';
// });

Route::get('login', function(){
 return view('login');
});

Route::get('hello', 'Hello@index');

//TODO: apus ini klo ga dipake lagi
Route::group(array('prefix' => 'api'), function(){
		Route::resource('json', 'JsonController');
	});

Route::get('/hfafa',function(){

	echo 'welcome';
});

Route::get('api/getQuote/{jumlah}', 'JsonController@getQuote');
Route::get('api/getQuoteByAuthor/{jumlah}/{author}', 'JsonController@getQuoteByAuthor');
Route::get('api/getQuoteBySource/{jumlah}/{source}', 'JsonController@getQuoteBySource');
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

});

 Route::get('termofuse', function(){
 	return view('termofuse');
 });

 Route::get('home', function(){
 	return View::make('home');
 });
 Route::get('api', function(){
 	return View::make('pages.apitutorial');
 });
 Route::get('sourcecode', function(){
 	return View::make('pages.sourcecode');
 });

 Route::get('login', function(){
 	return view('login');
 });

 Route::get('about', function () {
    return view('about');
 });
