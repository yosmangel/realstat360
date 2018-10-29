@extends('layouts.app')
@section('title','Registro')
@section('content')
     <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="{{route('home')}}" class="logo pull-left">
                    <img src="{{ asset('images/logo5.png') }}" height="50" alt="Logo" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Registro {{ $type }}</h2>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register',1) }}">
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
                            <input type="hidden" name="user_type" id="tipo_usuario" value={{ $user_type }}> <!-- tipo_usuario = 1 => Profesional -->
                            <div class="form-group mb-lg {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Nombre</label>
                                    <input id="name" name="name" type="text" class="form-control input-lg" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group mb-lg {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname">Apellidos</label>
                                <input id="lastname" name="lastname" type="text" class="form-control input-lg" value="{{ old('lastname') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mb-lg {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" type="email" class="form-control input-lg" value="{{ old('email') }}" required>
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mb-none {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6 mb-lg">
                                        <label for="password">Contraseña</label>
                                        <input id="password" name="password" type="password" class="form-control input-lg" required>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-sm-6 mb-lg">
                                        <label for="password-confirm">Confirmar Contraseña</label>
                                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="AgreeTerms" name="agreeterms" type="checkbox" required/>
                                        <label for="AgreeTerms">Acepto los <a href="#">Términos y Condiciones </a></label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Registrar</button>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Registrar</button>
                                </div>
                            </div>

                            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span>o</span>
                            </span>
                            <p class="text-center">¿Ya tiene una cuenta? <a href="{{ url('/ingresar/'.$type) }}">¡Ingresar!</a></p>
                            <p class="text-center text-danger">Volver a la página de  <a href="{{ url('/') }}">Inicio</a></p>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. Todos los derechos reservados.</p>
            </div>
        </section>
        <!-- end: page -->
        @include('partials.footer')
@endsection
