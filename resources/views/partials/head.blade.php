<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Sistema Inmobiliario</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <!-- Styles -->
    <!-- Web Fonts  -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}">
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/pnotify/pnotify.custom.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/elusive-icons/css/elusive-icons.css') }}">

    
   
    <!-- Specific Styles CSS-->
    @yield('css')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/stylesheets/skins/default.css') }}">
    
    <!-- Alerts y Confirms-->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert-master/dist/sweetalert.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('plugins/modernizr/modernizr.js') }}"></script>
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>