<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Empleados</title>
	<link rel="stylesheet" type="text/css" href="{{ url('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('plugins/fontawesome/css/all.min.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<div class="container-fluid">
	    <figure class="text-center">
  			<blockquote class="blockquote">
  				<br>
    			<h2>Empleados</h2>
  			</blockquote>
  			<figcaption class="blockquote-footer">
    			Lista de empleados de la <cite title="Source Title">Empresa</cite>
  			</figcaption>
		</figure>
	</div>
	<div class="container-fluid">
		@yield('container')
	</div>

	<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    	© 2021 Copyright:
    	<p>Michael Castillo Lasso</p>
  	</div>	
<script src="{{ url('plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ url('plugins/fontawesome/js/all.min.js') }}"></script>
</body>
</html>