@extends('Homepage.layouts.app')
@section('title','Sistema Intermediación Oferta-Demanda')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content')
    <div class="body">
        @include('Homepage.partials.header')
        <div role="main" class="main">
            <section class="section bottom-xxmin section-no-border" id="start-now">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 center">
                            <h3 class="heading-dark mb-none top-md">SISTEMA DE INTERMEDIACIÓN ENTRE OFERTA Y DEMANDA DE INMUEBLES</h3>
                        </div> 
                    </div>

                    <div class="row mt-xl">
                        <div class="col-md-6">
                            <hr> 
                            <blockquote class="text-md text-center text-spacing-md">
                                El Sistema de Intermediación Facilita la Relación entre la <span class="alternative-font">OFERTA</span> y <span class="alternative-font">Demanda</span> de Inmuebles
                            </blockquote>
                        </div>
                        <div class="col-md-6">
                            <div class="testimonial testimonial-style-4 appear-animation card" data-appear-animation="fadeInRight" data-appear-animation-delay="0">
                                <h4 class="heading-primary mb-xs text-center"><strong id="txt-title">¿BUSCAS UN INMUEBLE?</strong></h4>
                                <br>
                                <hr class="hr-deep-blue">
                                <form action="{{ route('demanda') }}" method="post">
                                    <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                    <input type="hidden" name="user_type" id="tipo_usuario" value="0"> <!-- tipo_usuario = 0 => Propietario -->
                                    <div class="form-body"> 
                                        <h5 class="heading-default text-spacing-md text-center">Dinos que estás buscando y te sugerimos las mejores opciones acorde a tus preferencias.</h5>
                                        <div class="form-group">
                                            <label for="descripcion"><strong>¿Que estás buscando?</strong></label>
                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" placeholder="Escriba una breve descripción de lo que estás buscando. Ejemplo: Local comercial en Madrid Centro."></textarea>
                                        </div>
                                        <h5 class="heading-default text-spacing-md text-center">Escribe tu información de contacto.</h5>
                                        <div class="form-group">
                                            <label for="name"><strong>Nombre</strong></label>
                                            <input type="text" name="name" id="name" placeholder="Ingresa tu nombre" value="{{ old('name') }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname"><strong>Apellidos</strong></label>
                                            <input type="text" name="lastname" id="lastname" placeholder="Ingresa tu nombre" value="{{ old('lastname') }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone"><strong>Teléfono</strong></label>
                                            <input type="text" name="telephone" id="telephone" placeholder="(123) 45678" value="{{ old('telephone') }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email"><strong>Correo Electrónico</strong></label>
                                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="tucorreo@mail.com" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row" id="continuar-to-register" style="display: none;">
                                        <div class="alert alert-info fade in nomargin text-left">
                                            <h5>¿Deseas continuar y completar tu perfil en 
                                                RealState360?
                                            </h5>
                                            <p>Con tu cuenta de usuario 
                                                podrás personalizar la búsqueda de inmuebles y 
                                                contactar a Propietarios de Inmuebles que están 
                                                afiliados a nuestra plaraforma.
                                            </p>
                                            <a class="btn btn-primary btn-lg" href="/registro/demanda" type="button">
                                                <strong>¡Continuar, Sí, esta es la mejor opción!</strong>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="mensaje" >
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button id="btn_enviar_solicitud" type="submit" class="btn btn-warning btn-lg btn-block btn-create" data-loading-text="Cargando...">
                                            <i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-search i-shown"></i>&nbsp;<strong id="btn-txt">BUSCAR INMUEBLES</strong>
                                        </button>
                                        <button class="btn btn-tertiary btn-lg btn-block btn-repeat-search" type="button">
                                            <i class="fa fa-repeat" aria-hidden="true"></i>&nbsp;Repetir la Búsqueda
                                        </button>
                                    </div>
                                </form>
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
@section('js')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection
