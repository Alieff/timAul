<!DOCTYPE html>
<html>
	<head>
    	@include('layouts.head')
	</head>
	<body>
		<!--NAVBAR CODE HERE -->
		@include('layouts.navbar')
		<!--CONTENT OF BODY HERE -->
		<div id="wrapper">
		@yield('bodycontent')
		</div>
	</body>
	<footer class="footer">
		@include('layouts.footer')
	</footer>

	

</html>
