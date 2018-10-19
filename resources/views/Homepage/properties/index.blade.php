@extends('layouts.app')
@section('title', 'Panel de Administración Propietarios')
@section('content')
    <div class="body">
            @include('partials.header')
            <div role="main" class="main">
                @include('properties.sections.title_and_breadcrumbs')
                @if(Auth::user()->user_type == 0)
                    @include('properties.list')
                @elseif(Auth::user()->user_type == 1)
                    @include('panels.demand.panel_demand')
               	@endif
            </div>
       @include('partials.footer')
    </div>
@endsection 