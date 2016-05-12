@extends('layouts.adminpage')
@section('bodycontent')

<div id="links">

</div>

<script language="javascript" type="text/javascript">
function loadlink(){
    $('#links').load('../runjava',function () {
         $(this).unwrap();
    });
}

loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 5000);	
</script>
@endsection