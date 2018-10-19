@extends('Homepage.layouts.app')
@section('title', 'Panel de DEMANDA de Inmuebles')
@section('content')
    <div class="body">
            @include('Homepage.partials.header')
            <div role="main" class="main">
            	@include('Homepage.partials.title_and_breadcrumbs', ['title' => 'Panel Demanda','path' => '/panel-demanda'])
                @include('Homepage.demands.panel')
                @include('Homepage.demands.sections.form_demand')
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection