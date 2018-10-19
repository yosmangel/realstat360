@extends('Homepage.layouts.app')
@section('title','Ingresar')
@section('content')
    <div class="body">
        @include('Homepage.partials.header') 
        <div role="main" class="main" id="demanda">
            <div class="slider-container light rev_slider_wrapper">
                <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 500, 'disableProgressBar': 'on'}">
                    <ul>
                        <li data-transition="fade">
                            <img src="{{ asset('img/homepage/portada.jpg') }}"  
                                alt=""
                                data-bgposition="center center" 
                                data-bgfit="cover" 
                                data-bgrepeat="no-repeat" 
                                data-kenburns="on"
                                data-duration="9000"
                                data-ease="Linear.easeNone"
                                data-scalestart="150"
                                data-scaleend="100"
                                data-rotatestart="0"
                                data-rotateend="0"
                                data-offsetstart="0 0"
                                data-offsetend="0 0"
                                data-bgparallax="0"
                                class="rev-slidebg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="featured-box featured-box-primary align-left mt-xlg bg-deep-blue-transparent">
                                            <div class="box-content">
                                                    <h4 class="heading-primary text-uppercase mb-md">¿Búscas un Inmueble?</h4>
                                                    <form action="" id="frmSignInPropietario" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_type" id="tipo_usuario" value="0"> <!-- tipo_usuario = 0 => Propietario -->
                                                        <div class="row">
                                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <div class="col-md-12">
                                                                    <label for="email">Correo Electrónico</label>
                                                                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control input-lg" required autofocus>
                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="remember-box checkbox">
                                                                    <label for="rememberme">
                                                                        <input type="checkbox" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;Recordar acceso
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-rs360-deep-blue btn-transparent pull-right mb-xl" data-loading-text="Cargando...">
                                                                    <i class="fa fa-sign-in"></i>&nbsp;Ingresar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                   
            </div>
           
        </div>
        @include('Homepage.partials.footer')
    </div>
@endsection