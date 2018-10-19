@extends('layouts.app')
@section('title', 'Nuevo Inmueble')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endsection
@section('content')
    <div class="body">
            @include('partials.header')
            <div role="main" class="main">
                @include('properties.sections.title_and_breadcrumbs', ['home' => 'home'])
            	<div class="container">
            		<div class="row">
            			<div class="col-xs-12">
                			@include('properties.form', [ 'url' => 'propiedades/', 'method' => 'POST', 'property' => $property, 'btn_submit' => 'Crear Inmueble', 'btn_icon' => 'plus' ])
            			</div>
            		</div>
            	</div>
            </div>
       @include('partials.footer')
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
@endsection