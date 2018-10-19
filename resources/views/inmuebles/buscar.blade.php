@extends('layouts.app')
@section('title','Buscador')
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

			<div class="row">
				<div class="col-xs-6">
					<div style="width: 100%; height: 400px;">
						{!! Mapper::render() !!}
					</div>
				</div>
			</div>
			<form action="{{ route('encuentra') }}" method="post">
				<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-codigo-postal">C.P.</label>
					<div class="col-sm-8">
						<input type="text" class="form-control input-sm" name="codigo_postal" id="codigo_postal" required>
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-info btn-block" id="buscarcp">Buscar</button>
					</div>
				</div>
			</form>

        </div>
        @include('partials.aside')
    </section>
@endsection
@section('js')
   <!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<!-- Personalized -->
	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('js/main/archivos_dropzone_create.js') }}" ></script>
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
	<script src="{{ asset('js/main/common.js') }}"></script>
@endsection
