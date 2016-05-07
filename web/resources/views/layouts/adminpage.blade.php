<!DOCTYPE html>
<html>
	<head>
    	@include('layouts.adminhead')
	</head>
	
	<body>
		<!--NAVBAR CODE HERE -->
		@include('layouts.navbaradmin')
		<!--CONTENT OF BODY HERE -->
		@yield('bodycontent')
	</body>

	<footer class="footer">	
		@include('layouts.footer')
	</footer>

</html>
