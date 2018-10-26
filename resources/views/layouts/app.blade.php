<!DOCTYPE html>
<html lang="es">
@include('partials.head')
<body>
    @yield('content')

    <!-- Scripts -->
    <!-- THE NEXT LINE IS FOR CONFIGURING A JS FRAMEWORK LIKE VUE.JS-->
    <!--script src="asset('js/app.js') }}"></script-->

    <!-- Vendor -->
	<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>

	<script src="{{ asset('plugins/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

	
	<!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeHD5h03-YMxjHIQXL-TYtgxn_cSvamcQ&callback=initMap" async defer></script-->
	<script src="{{ asset('plugins/nanoscroller/nanoscroller.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('plugins/magnific-popup/jquery.magnific-popup.js') }}"></script>
	<script src="{{ asset('plugins/jquery-placeholder/jquery-placeholder.js') }}"></script>
	
	<!-- Theme Base, Components and Settings -->
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>

	<script src="{{ asset('plugins/sweetalert-master/dist/sweetalert-dev.js') }}"></script>
    @yield('js')

	<!-- Alerts y Confirms-->
	<script src="{{ asset('js/theme.js') }}"></script>
	<!-- Theme Custom -->
	<script src="{{ asset('js/theme.custom.js') }}"></script>
	<!-- Theme Initialization Files -->
	<script src="{{ asset('js/theme.init.js') }}"></script>
	<script src="{{ asset('js/ui-elements/examples.modals.js') }}"></script>
</body>
</html>
