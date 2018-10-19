@extends('layouts.app')
@section('title','Ingresar')
@section('content')
    <div class="container">
        <div class="featured-boxes separador-min">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="featured-box featured-box-primary align-left mt-xlg">
                        <div class="box-content">
                            @if($tipo_acceso == 'propietario')
                                <h4 class="heading-primary text-uppercase mb-md">Ingreso de PROPIETARIOS</h4>
                                <form action="{{ route('login') }}" id="frmSignInPropietario" method="post">
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
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <a class="pull-right" href="{{ route('password.request') }}">(¿Olvido su contraseña?)</a>
                                                <label for="password">Contraseña</label>
                                                <input type="password" id="password" name="password" class="form-control input-lg" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
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
                            @else
                                <h4 class="heading-primary text-uppercase mb-md">Ingreso de DEMANDA</h4>
                                <form action="{{ route('login') }}" id="frmSignInDemanda" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_type" id="tipo_usuario" value="2"> <!-- tipo_usuario = 2 => Demanda -->
                                    <!-- USER TYPE -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="user_type">Perfil</label>
                                                <select name="user_type" id="user_type" class="form-control" required>
                                                    <option value="">:: Seleccionar ::</option>
                                                    <option value="4">Usuario</option>
                                                    <option value="2">Firma Comercial</option>
                                                    <option value="3">Marca Comercial</option>
                                                    <option value="{{ old('user_type') }}">{{ old('user_type') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <a class="pull-right" href="{{ route('password.request') }}">(¿Olvido su contraseña?)</a>
                                                <label for="password">Contraseña</label>
                                                <input type="password" id="password" name="password" class="form-control input-lg" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
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
                                            <button type="submit" class="btn btn-rs360-deep-blue btn-transparent  pull-right mb-xl" data-loading-text="Cargando...">
                                                <i class="fa fa-sign-in"></i>&nbsp;Ingresar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  

            <!-- Aviso de Registro -->
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5>¿Aún no te has registrado?</h5>
                    <a href="{{ route('tipo-registro') }}" class="btn btn-danger btn-transparent "><i class="fa fa-share-square-o"></i>&nbsp;Ir al Registro</a>
                </div>
            </div><hr>
             <div class="row text-center">
                <a href="{{ url('/') }}">
                    ¿Volder a la página de Inicio?
                </a>
            </div>
        </div>
    </div>
@endsection
