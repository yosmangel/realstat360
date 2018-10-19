@extends('Homepage.layouts.app')
@section('title','Registro')
@section('content')
    <div class="body">
        @include('Homepage.partials.header')
        <div role="main" class="main">
            <section class="section bottom-xxmin section-no-border" id="start-now">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 center">
                            <h3 class="heading-dark mb-none top-md">DISPONES DE DIFERENTES HERRAMIENTAS PARA LA GESTIÓN DE TUS INMUBLES</h3>
                        </div> 
                    </div>

                    <div class="row mt-xl">
                        <div class="col-md-6">
                            <div class="testimonial testimonial-style-4 appear-animation card" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                                <h4 class="heading-primary mb-xs text-center"><strong>Software de Gestión Comercial de Propiedades para Profesionales, Agencias y Marcas Comerciales</strong></h4>
                                <hr class="hr-deep-blue">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{ url('/ingresar/profesionales') }}" class="btn btn-rs360-deep-blue btn-card btn-block btn-lg"><strong>INGRESAR</strong></a>
                                        <a href="{{ url('/contactanos') }}" class="btn btn-info btn-card btn-block btn-lg"><strong>SOLICITAR DEMO</strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="testimonial testimonial-style-4 appear-animation card" data-appear-animation="fadeInRight" data-appear-animation-delay="0">
                                <h4 class="heading-primary mb-xs text-center"><strong>Software de Gestión Comercial de Propiedades Para Particulares</strong></h4>
                                <br>
                                <hr class="hr-deep-blue">
                                <a href="{{ url('/ingresar/propietarios') }}" class="btn btn-primary btn-card  btn-block btn-lg"><strong>INGRESAR</strong></a>
                                <a href="{{ url('/registro/propietarios') }}" class="btn btn-warning btn-card  btn-block btn-lg"><strong>REGISTRARSE</strong></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <a href="{{ url('/') }}">
                            ¿Volder a la página de Inicio?
                        </a>
                    </div>
                </div>
            </section>
        </div>
        @include('Homepage.partials.footer')
    </div>
@endsection
