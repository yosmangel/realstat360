@extends('layouts.app_login_register')
@section('title','Restablecer Contraseña')
@section('content')
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo pull-left">
                <img src="{{ asset('images/realstate360.png') }}" height="54" alt="Logo" />
            </a>
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Recuperación</h2>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="form-group mb-lg {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Correo Electrónico</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="email" class="form-control input-lg" value="{{ $email or old('email') }}" required autofocus>
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                            </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-group mb-lg {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="clearfix">
                                <label for="password" class="pull-left">Contraseña</label>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" id="password" type="password" class="form-control input-lg" required>
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group mb-lg {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="clearfix">
                                <label for="password-confirm" class="pull-left">Confirmar Contraseña</label>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password_confirmation" id="password-confirm" type="password" class="form-control input-lg" required>
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Restablecer Contraseña
                                </button>
                            </div>
                        </div>

                        <br>
                        <p class="text-center">Ir a la página de <a href="{{ url('/') }}">Inicio</a></p>
                        <!--p class="text-center">¿Aún no se ha registrado? <a href="{{ url('/register') }}">¡Ir al Registro!</a></p-->
                    </form>
                </div>
            </div>
            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. Todos los derechos reservados.</p>
        </div>
    </section>
    @include('partials.footer')
@endsection
