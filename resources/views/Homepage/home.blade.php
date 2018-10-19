@extends('layouts.app')
@if(Auth::user()->user_type == 0)
    @section('title', 'Panel de PROPIETARIOS de Inmuebles')
@elseif(Auth::user()->user_type == 1)
    @section('title', 'Panel de DEMANDA de Inmuebles')
@endif
@section('content')
    <div class="body">
            @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.properties.sections.title_and_breadcrumbs')
                @if(Auth::user()->user_type == 0)
                    @include('Homepage.properties.panel')
                @elseif(Auth::user()->user_type == 1)
                    @include('demands.panel')
                @endif
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection 