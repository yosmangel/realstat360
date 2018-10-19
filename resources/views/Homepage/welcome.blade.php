@extends('Homepage.layouts.app')
@section('title', 'Portal Inmobiliario')
@section('content')
    <div class="body">
        @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.partials.slider')
                <!-- ¿How RS360 Functions? -->
                <div class="home-intro" id="home-intro">
                    <div class="container">
                        <hr>
                        <div class="row mt-xl">
                            <div class="col-md-6">
                                <a href="{{ url('/software-inmobiliario') }}" class="btn btn-primary btn-block btn-lg appear-animation btn-xlg" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                                    <i class=" fa fa-3x fa-cogs"></i>
                                    <strong>SOFTWARE <br>INMOBILIARIO</strong>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/sistema-intermediacion') }}" class="btn btn-warning btn-block btn-lg appear-animation btn-xlg" data-appear-animation="fadeInRight" data-appear-animation-delay="0">
                                    <i class=" fa fa-3x fa-desktop"></i>
                                    <strong>SISTEMA DE <br>INTERMEDIACIÓN</strong>
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
    </div>
    @include('Homepage.partials.footer')
@endsection