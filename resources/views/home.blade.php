@extends('layouts.app')
@section('title','Bienvenido')
@section('css')
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/morris.js/morris.css') }}">
@endsection

@section('content')
    <section class="body">
        @include('partials.header')
        <div class="inner-wrapper">
            @include('partials.menu_left')
            @include('home.index')
        </div>
        @include('partials.aside')
    </section>
@endsection
@section('js')
    <!-- Specific Page Vendor -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/jqueryui-touch-punch/jqueryui-touch-punch.js') }}"></script>
    <script src="{{ asset('plugins/jquery-appear/jquery-appear.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/flot.tooltip/flot.tooltip.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('plugins/jquery-sparkline/jquery-sparkline.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael.js') }}"></script>
    <script src="{{ asset('plugins/morris.js/morris.js') }}"></script>
    <script src="{{ asset('plugins/gauge/gauge.js') }}"></script>
    <script src="{{ asset('plugins/snap.svg/snap.svg.js') }}"></script>
    <script src="{{ asset('plugins/liquid-meter/liquid.meter.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.js') }}"></script>
    
    <script src="{{ asset('js/main/home.js') }}"></script>
@endsection
