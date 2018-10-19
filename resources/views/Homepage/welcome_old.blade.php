@extends('Homepage.layouts.app')
@section('title', 'Portal Inmobiliario')
@section('content')
    <div class="body">
        @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.partials.slider')
                <!-- ¿What is RS360? -->
                @include('Homepage.partials.what_is_rs360')

                <!-- ¿How RS360 Functions? -->
                @include('Homepage.partials.how_it_function')

                @include('Homepage.demands.sections.fast_demand')

                <!-- Propietaries -->
                @include('Homepage.partials.propietaries')

                @include('Homepage.partials.call_action')
                
                <!-- Profetionals -->
                @include('Homepage.partials.profetionals')
                
                <!-- WHAT WE HAVE FOR YOU -->
                @include('Homepage.partials.what_we_have')

                <!-- Demands -->
                @include('Homepage.partials.demands')
            </div>
    </div>
    @include('Homepage.partials.footer')
@endsection