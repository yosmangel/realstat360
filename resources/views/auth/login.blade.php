@extends('layouts.app')
@section('title','Ingresar')
@section('content')
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="{{route('home')}}" class="logo pull-left">
                <img src="{{ asset('images/logo5.png') }}" height="54" alt="Logo" />
            </a>
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i>Ingreso</h2>
                </div>
                <div class="panel-body">
                    <form action="{{ route('login', 0) }}" id="frmSignInPropietario" class="form-horizontal" role="form" method="POST">
                        {{ csrf_field() }}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            <div class="alert alert-warning text-center">
                                @foreach($errors->all() as $error)
                                    {{ $error }} 
                                    <br>
                                @endforeach
                            </div>
                        @endif
                        <input type="hidden" name="user_type" id="tipo_usuario" value=1> <!-- tipo_usuario = 1 => Profesional, tipo_usuario = 0 => Propietario -->
                        <div class="form-group mb-lg {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Correo Electrónico</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="text" class="form-control input-lg" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                            </div>
                                
                        </div>
                       
                        <div class="form-group mb-lg {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="clearfix">
                                <label for="password" class="pull-left">Contraseña</label>
                                <a href="{{ url('/password/reset') }}" class="pull-right">¿Olvidó la contraseña?</a>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" class="form-control input-lg" required>
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


                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Recordar acceso</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Ingresar</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" data-loading-text="Cargando...">Ingresar</button>
                            </div>
                        </div>

                        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                            <span>or</span>
                        </span>
                        
                    </form>
                </div>
            </div>
            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. Todos los derechos reservados.</p>
        </div>
    </section>
    <!-- end: page -->
@endsection
