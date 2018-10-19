<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="Tepublico | Programador: Rafael Gámez">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Error de Acceso Restringido | RS360</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <!-- Styles -->
    <!-- Web Fonts  -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
</head>
<body>
	<div class="container" style="margin-top: 150px">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2>!!Área Restringida!!</h1>
				<h3>Lo sentimos, tu perfil de usuario no tiene permiso para acceder aquí.</h2>
			</div>
			<div class="col-xs-12 text-center">
				<a href="{{ url('/') }}" class="btn btn-danger">Regresar</a>
			</div>
		</div>
	</div>
</body>
</html>