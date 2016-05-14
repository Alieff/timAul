@section('mycss')
<link rel="stylesheet" href="../resources/assets/css/sourcecode.css">
@endsection
@extends('layouts.page')
@section('bodycontent')

<?php 
$chunks = explode("/", Request::root());
$url = Config::get('app.url')."/".$chunks[3]."/timAul/InspireCrawler/doc/index.html";	
?>

 <iframe class="documentation"  frameborder="0" width="100%" height="550vh" align=center src="<?php echo $url; ?>"></iframe>

 @endsection
