<!DOCTYPE html>
<html lang="es">
@include('partials.head')
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
	    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>
</body>
</html>
