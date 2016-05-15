<!DOCTYPE html>
<html>
	<head>
    	@include('layouts.head')
	</head>
	<body>
		<!--NAVBAR CODE HERE -->
		@include('layouts.navbar')
		<!--CONTENT OF BODY HERE -->
		@yield('bodycontent')
		
	</body>
	<footer class="footer">
		@include('layouts.footer')
	</footer>

</html>
