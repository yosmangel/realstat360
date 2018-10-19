<!DOCTYPE html>
<html lang="es">
@include('Homepage.partials.head')
<body data-spy="scroll" data-target=".wrapper-spy" data-offset="100">
    @yield('content')

    <!-- Vendor -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    
    <script src="{{ asset('vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.validation/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        
    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('front/js/theme.js') }}"></script>
        
    <!-- Current Page Vendor and Views -->
    <script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('front/js/functions.js') }}"></script>        
    <!-- Bootstrap File-Input Script -->
    
    <!-- Theme Initialization Files -->
    <script src="{{ asset('front/js/theme.init.js') }}"></script>
    <!-- Theme Custom -->
    <script src="{{ asset('front/js/fileinput.js') }}"></script>

    @yield('js')
        
    <script src="{{ asset('front/js/examples/examples.portfolio.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
</body>
</html>