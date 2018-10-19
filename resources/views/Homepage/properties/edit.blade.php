@extends('layouts.app')
@section('title', 'Editar Inmueble')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkboxes.css') }}">
@endsection
@section('content')
    <div class="body">
            @include('partials.header')
            <div role="main" class="main">
                @include('properties.sections.title_and_breadcrumbs')
            	<div class="container">
            		<div class="row">
            			<div class="col-xs-12">
                			@include('properties.form', [ 'url' => 'propiedades/'.$property->id, 'method' => 'PATCH', 'property' => $property, 'btn_submit' => 'Actualizar', 'btn_icon' => 'edit'  ])
            			</div>
            		</div>
            	</div>
            </div>
       @include('partials.footer')
    </div>
@endsection 