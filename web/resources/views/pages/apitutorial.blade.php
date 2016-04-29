@section('mycss')
<link rel="stylesheet" href="../resources/assets/css/sourcecode.css">
@endsection
@extends('layouts.page')




@section('bodycontent')
<?php 
$chunks = explode("/", Request::root());
$url = Config::get('app.url')."/".$chunks[3]."/InspireCrawler/apidoc/index.html";	
?>
 <!-- <iframe class="documentation" align=center src="<?php // echo $url;	?>"></iframe> -->
 <!-- <iframe class="documentation" align=center src="<?php // echo $url?>"></iframe> -->
 <iframe class="documentation" align=center src="<?php echo $url ;?>"></iframe>


<?php 
//  echo Request::server ("SERVER_NAME")."<br>"; 
//  echo Request::root()."<br>"; 
// echo URL::to('/')."<br>";
// echo "<br>";
// echo Config::get('app.url');
// echo "<br>";
// //echo url();
// //echo "<br>";
// echo url()->current();
// echo "<br>a";
// echo Request::segment(0);
// echo "<br>";
// echo HTML::link('http://test.com', 'testing');

?>
<!-- <a href="<?php //echo Request::root(); ?>">aaaaaa</a> -->
<!-- <a href="<?php //echo $url2; ?>">bbbbbbb</a> -->
<!-- <a href="hiya">Some Text</a> -->

 @endsection