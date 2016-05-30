<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default') | Panel Administrador</title>
	<link href=" {{ asset('plugins/bootstrap/css/bootstrap.css') }} "rel="stylesheet">
	<link href=" {{ asset('plugins/css/main.css') }} "rel="stylesheet">
	<script src="{{ asset('plugins/jquery/jquery-2.2.3.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
</head>
<body>
	@include('admin.nav')
	<section class="section-admin">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">@yield('title')</h3>
			</div>
			<div class="panel-body">
				@include('flash::message')
				@include('admin.errores')
				@yield('content')			
			</div>
		</div>
	</section>

	<footer>
		@include('admin.footer')
	</footer>
	</body>
</html>