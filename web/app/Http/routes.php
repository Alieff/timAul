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

Route::get('contact', 'ContactController@getContact');

Route::post('contact_request','ContactController@getContactUsForm');

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

 Route::get('contact', function () {
    return view('contact');
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
		exec('bash -c "exec nohup setsid /usr/lib/jvm/java-8-oracle/bin/java -Didea.launcher.port=7533 -Didea.launcher.bin.path=/home/haryoaw/IJ/bin -Dfile.encoding=UTF-8 -classpath /usr/lib/jvm/java-8-oracle/jre/lib/charsets.jar:/usr/lib/jvm/java-8-oracle/jre/lib/deploy.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/cldrdata.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/dnsns.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/jaccess.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/jfxrt.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/localedata.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/nashorn.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/sunec.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/sunjce_provider.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/sunpkcs11.jar:/usr/lib/jvm/java-8-oracle/jre/lib/ext/zipfs.jar:/usr/lib/jvm/java-8-oracle/jre/lib/javaws.jar:/usr/lib/jvm/java-8-oracle/jre/lib/jce.jar:/usr/lib/jvm/java-8-oracle/jre/lib/jfr.jar:/usr/lib/jvm/java-8-oracle/jre/lib/jfxswt.jar:/usr/lib/jvm/java-8-oracle/jre/lib/jsse.jar:/usr/lib/jvm/java-8-oracle/jre/lib/management-agent.jar:/usr/lib/jvm/java-8-oracle/jre/lib/plugin.jar:/usr/lib/jvm/java-8-oracle/jre/lib/resources.jar:/usr/lib/jvm/java-8-oracle/jre/lib/rt.jar:/var/www/html/timAul/InspireCrawler/out/production/InspireCrawler:/var/www/html/timAul/InspireCrawler/lib/junit-4.12.jar:/var/www/html/timAul/InspireCrawler/lib/hamcrest-core-1.3.jar:/var/www/html/timAul/InspireCrawler/lib/mongo-java-driver-3.2.2.jar:/var/www/html/timAul/InspireCrawler/lib/stanford-corenlp-3.6.0-models.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xom.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xz-1.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jdom-1.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jollyday.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/nekohtml.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/protobuf.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/rome-0.9.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/ejml-0.23.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/je-5.0.73.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/joda-time.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/slf4j-api.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/javax.json.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xom-1.2.10.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/dom4j-1.6.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xalan-2.7.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/guava-14.0.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/httpcore-4.4.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/pdfbox-1.8.4.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/slf4j-simple.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/crawler4j-4.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/ejml-0.23-src.zip:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/fontbox-1.8.4.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jempbox-1.8.4.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/joda-time-2.9.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/tagsoup-1.2.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/tika-core-1.5.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xmpcore-5.1.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/httpclient-4.4.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jaxb-api-2.2.7.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jhighlight-1.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jollyday-0.4.7.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/netcdf-4.2-min.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/poi-3.10-beta2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xmlbeans-2.3.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xom-1.2.10-src.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/json-simple-1.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xml-apis-1.3.03.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/aspectjrt-1.6.11.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/boilerpipe-1.1.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/slf4j-api-1.7.10.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/slf4j-api-1.7.12.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/tika-parsers-1.5.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xercesImpl-2.8.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/xercesImpl-2.8.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/asm-debug-all-4.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/bcmail-jdk15-1.45.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/bcprov-jdk15-1.45.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/commons-codec-1.9.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/isoparser-1.0-RC-1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/javax.json-api-1.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/commons-logging-1.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/org.json.simple-0.4.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/commons-compress-1.5.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/poi-ooxml-3.10-beta2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/vorbis-java-core-0.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/vorbis-java-tika-0.1.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/joda-time-2.9-sources.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/stanford-parser-3.6.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/jollyday-0.4.7-sources.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/stanford-corenlp-3.6.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/apache-mime4j-dom-0.7.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/juniversalchardet-1.0.3.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/lidalia-slf4j-ext-1.0.0.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/mongo-java-driver-3.2.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/apache-mime4j-core-0.7.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/metadata-extractor-2.6.2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/poi-scratchpad-3.10-beta2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/javax.json-api-1.0-sources.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/vorbis-java-core-0.1-tests.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/poi-ooxml-schemas-3.10-beta2.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/stanford-corenlp-3.6.0-models.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/stanford-corenlp-3.6.0-javadoc.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/stanford-corenlp-3.6.0-sources.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/mysql-connector-java-5.1.38-bin.jar:/opt/lampp/htdocs/timAul/timAul/InspireCrawler/lib/geronimo-stax-api_1.0_spec-1.0.1.jar:/home/haryoaw/IJ/lib/idea_rt.jar com.intellij.rt.execution.application.AppMain main.CrawlerController > /dev/null 2>&1 &"');
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

Route::get('admin/dashboard', 'DashboardController@index');


Route::get('setting', 
  ['as' => 'admin.setting', 'uses' => 'SettingController@readConfig']
);

Route::post('setting', 
  ['as' => 'setting_store', 'uses' => 'SettingController@store']
);
