@extends('layouts.app')
@section('title', 'Gestion de Inmuebles')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/skins/skin-real-estate.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/demos/demo-real-estate.css') }}">
@endsection
@section('content') 
    <div class="body">
            @include('partials.header') 
            <div role="main" class="main">
            	@include('properties.sections.title_and_breadcrumbs')
            	@include('properties.sections.services')
            </div>   
       @include('partials.footer')
    </div>
@endsection 