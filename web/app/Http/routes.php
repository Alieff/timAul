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


	Route::get('contact', 
	  ['as' => 'contact', 'uses' => 'ContactController@create']
	);

	Route::get('/contact', array('as' => 'contact', 'uses' => 'ContactController@create'));

	Route::post('contact', 
	  ['as' => 'contact_store', 'uses' => 'ContactController@store']
	);


Route::get('mail', function () {
  return view('test');
});

// Route::get('/hello',function(){
//     return 'Hello World!';
// });

Route::get('login', function(){
 return view('login');
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

 Route::get('sourcecode', function(){
 	return View::make('sourcecode');
 });

 Route::get('login', function(){
 	return view('login');
 });

 Route::get('about', function () {
    return view('about');
 });

Route::get('apidoc',function(){
	return view('apidoc.apidocs');
});

Route::get('apioverview',function(){
	return view('apioverview');
});

 Route::get('javadocs', function(){
 	return view('pages.javadocs');
 });

 Route::get('documentation',function(){
 	return view('documentation');
 });

Route::get('faq', function () {
	 return view('faq');
});

Route::get('runjava', function () {
	echo shell_exec('cat tees.txt');
	//exec('bash -c "exec nohup setsid java test > /dev/null 2>&1 &"');
});

Route::resource('admin/quote', 'QuoteController', ['except' => [
    'show', 'edit'
],
'names' => [
	'store' => 'users.store'
]
]);

Route::get('admin/getQuotes', ['as' => 'admin.getquotes', 'uses' => 'QuoteController@testing']);

Route::get('admin/testing', function(){
	return view('admin.refresh');
});