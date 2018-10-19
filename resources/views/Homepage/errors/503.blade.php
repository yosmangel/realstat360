<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   

        <title>Error al Subir Imagen | RS360</title>   

        <meta name="keywords" content="Inmuebles, Propiedades, Propietarios, Demanda" />
        <meta name="description" content="Sitio web que pone en contacto la Oferta y Demanda de Inmuebles. Publica y Comercializa, o Busca y Encuentra el Inmuebe soñado">
        <meta name="author" content="tepublico.es">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

        <!-- Head Libs -->
        <script src="{{ asset('vendor/modernizr/modernizr.min.js') }}"></script>

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
                <h2>!!Error al subir la Imagen del Inmueble!!</h1>
                <h3>Intente nuevamente</h2>
            </div>
            <div class="col-xs-12 text-center">
                <a href="{{ route('propiedades.create') }}" class="btn btn-danger">Regresar al Registro de Inmuebles</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>