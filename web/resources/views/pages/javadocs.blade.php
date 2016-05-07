@section('mycss')
<link rel="stylesheet" href="../resources/assets/css/sourcecode.css">
@endsection
@extends('layouts.page')


@section('bodycontent')

<?php 
$chunks = explode("/", Request::root());

$url = Config::get('app.url')."/".$chunks[3]."/InspireCrawler/doc2/index.html";	
?>

 <iframe class="documentation"  frameborder="0" width="100%" height="550vh" align=center src="<?php echo $url; ?>"></iframe>

<?php 
//udah dicoba
// echo "//localhost/cobaaa/InspireCrawler/doc/index.html";
// echo "localhost/cobaaa/InspireCrawler/doc/index.html";
// Redirect::to();
// Redirect::away();
// echo Request::root()."/InspireCrawler/doc";
// WORK by edit directly http://localhost/cobaaa/InspireCrawler/doc/index.html
// echo $url;
// echo "<br>";
?>

 @endsection
