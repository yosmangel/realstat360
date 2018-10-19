@extends('Homepage.layouts.app')
@section('title', 'Panel de Administración Propietarios')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content')
    <div class="body">
            @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.propietaries.sections.title_and_breadcrumbs')
                @include('Homepage.propietaries.list')
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection 
@section('js')
    <!-- Specific Page Vendor -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection