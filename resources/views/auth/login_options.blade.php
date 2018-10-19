@extends('layouts.app')
@section('title','Ingresar')
@section('content')
    <div class="body">
        @include('partials.header')
        <div role="main" class="main">
            <section class="section bottom-xxmin section-no-border" id="start-now">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 center top-md">
                            <a href="{{ url('/') }}">
                                <img  src="{{ asset('img/logo/logoRS360_transparente.png') }}" width="180" alt="Logo" />
                            </a>
                            <h3 class="heading-dark mb-none top-md">ELIGE TU PERFIL PARA <strong>INGRESAR</strong></h3>
                        </div>
                    </div>
                    <div class="row mt-xl">
                        <div class="col-md-6">
                            <div class="testimonial testimonial-style-4 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                                <h4 class="heading-primary mb-xs text-center"><strong>PROPIETARIO</strong></h4>
                                <hr class="hr-deep-blue">
                                <blockquote class="text-md text-center text-spacing-md">
                                    Ponemos a tu disposición numerosas herramientas profesionales para la gestión
                                            comercial de <span class="alternative-font">inmuebles</span>.
                                </blockquote>
                                <a href="{{ url('ingresar/propietario') }}" class="btn btn-warning btn-block btn-lg"><strong><i class="fa fa-sign-in"></i>&nbsp;ENTRAR</strong></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="testimonial testimonial-style-4 appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="0">
                                <h4 class="heading-primary mb-xs text-center"><strong>DEMANDA</strong></h4>
                                <hr class="hr-deep-blue">
                                <blockquote class="text-md text-center text-spacing-md">
                                    De forma fácil, ponemos a tu disposición las mejores
                                            <span class="alternative-font">ofertas de inmuebles</span>&nbsp;&nbsp;acordes a tus preferencias.
                                </blockquote>
                                <a href="{{ url('ingresar/demanda') }}" class="btn btn-info btn-block btn-lg"><strong><i class="fa fa-sign-in"></i>&nbsp;ENTRAR</strong></a>                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="row text-center">
                        <a href="{{ url('/') }}">
                            ¿Volder a la página de Inicio?
                        </a>
                    </div>
                </div>
            </section>
            
            <!-- ¿How RS360 Functions? -->
            @include('partials.how_it_function')

            <!-- ¿How RS360 Functions? -->
            @include('partials.how_we_make_it')

            @include('partials.statistics')

            @include('partials.start_now')

            @include('partials.what_we_have')
        </div>
        @include('partials.footer')
    </div>
@endsection
