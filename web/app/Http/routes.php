<?php
use App\Quotes;
use Illuminate\Http\Request;

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

Route::post('contact',
  ['as' => 'contact_store', 'uses' => 'ContactController@store']
);

Route::get('mail', function () {
  return view('test');
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


Route::get('admin',function(){
   return redirect('admin/dashboard');
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

Route::get('admin/getQuotes', ['as' => 'admin.getquotes', 'uses' => 'CRUDController@search']);
Route::get('admin/addQuotes', ['as' => 'admin.addquotes', 'uses' => 'CRUDController@create']);
Route::get('admin/deleteQuotes', ['as' => 'admin.deletequotes', 'uses' => 'CRUDController@destroy']);

Route::get('admin/testing', function(){
	return view('admin.refresh');
});

Route::post('admin/playCrawler', function(Request $request){
		chdir('../../InspireCrawler/');
		exec('bash -c "echo hehe > /dev/null 2>&1 &"');
	 return Response::json("Hehe");
});

Route::post('admin/stopCrawler', function(Request $request){
	$pidJava = exec('./tangina.sh');

	shell_exec('bash -c "kill ' . $pidJava . '"');
	 return Response::json($pidJava);
});

Route::post('admin/getCrawlerStatus', function(Request $request){
	$pidJava = exec('./tangina.sh');

	if($pidJava) {
	 	return Response::json(["status" => "OK"]);
	} else {
		return Response::json(["status" => "NO"]);
	}
});

Route::post('admin/getLog', function(Request $request){
	$out = array();

	exec('cat ../../temporary_log.txt',$out);
	$log = "";
	if (!empty($out)) {
		exec('> ../../temporary_log.txt');
	}

	foreach ($out as $line) {
		$log = "$log $line<br>";
	}

	return Response::json(["isi" => "$log"]);
});

Route::resource('admin/CRUD', 'CRUDController', ['except' => [
    'show'
]]);

Route::auth();
Route::get('admin/updateStat', 'CRUDController@updateTotalQuotes');
Route::get('admin/dashboard', 'DashboardController@index');
Route::get('admin/AddQuote','CRUDController@indexAdd');



Route::get('admin/setting',
  ['as' => 'admin.setting', 'uses' => 'SettingController@readConfig']
);

Route::post('admin/setting',
  ['as' => 'setting_store', 'uses' => 'SettingController@store']
);

Route::get('admin/register', function () {
		return view('auth/register');
});
