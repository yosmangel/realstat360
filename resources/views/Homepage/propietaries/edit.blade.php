@extends('Homepage.layouts.app')
@section('title', 'Editar Inmueble')
@section('css')
    <link rel="stylesheet" href="{{ asset('front/css/checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content')
    <div class="body">
            @include('Homepage.partials.header') 
            <div role="main" class="main">
                @include('Homepage.propietaries.sections.title_and_breadcrumbs') 
            	<div class="container">
            		<div class="row">
            			<div class="col-xs-12">
                          @include('Homepage.propietaries.form', ['forId' => 'formEditarInmueble', 'url' => 'inmuebles-actualizar/'.$inmueble->id, 'method' => 'POST', 'inmueble' => $inmueble, 'btn_submit' => 'Editar Inmueble', 'btn_icon' => 'edit' ])
            			</div>
            		</div>
            	</div>
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection