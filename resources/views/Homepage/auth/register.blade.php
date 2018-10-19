@extends('layouts.app')
@section('title','Registro')
@section('content')
    <div class="container">
        <div class="featured-boxes separador-min">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="featured-box featured-box-primary align-left mt-xlg">
                        <div class="box-content">
                            @if($tipo_registro == 'propietario')
                                <h4 class="heading-primary text-uppercase mb-md">Registro de PROPIETARIO</h4>
                                <form action="{{ route('register') }}" id="frmSignUpPropietario" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_type" id="tipo_usuario" value=0> <!-- tipo_usuario = 1 => Propietario -->
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="email">Nombre</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control input-lg" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="email">Correo Electrónico</label>
                                                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control input-lg" required>
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
                                            <div class="col-md-6">
                                                <label for="password">Contraseña</label>
                                                <input type="password" id="password" name="password" class="form-control input-lg" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password-confirm">Repetir Contraseña</label>
                                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control input-lg" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-rs360-deep-blue btn-transparent pull-right mb-xl" data-loading-text="Cargando...">
                                                <i class="fa fa-plus"></i>&nbsp;Registrar
                                            </button> 
                                        </div>
                                    </div>
                                </form>
                            @elseif($tipo_registro == 'demanda')
                                <h4 class="heading-primary text-uppercase mb-md">Registro como DEMANDA</h4>
                                <form action="{{ route('register') }}" id="frmSignUpDemanda" method="post">
                                    {{ csrf_field() }}
                                    
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
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="email">Nombre Completo</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control input-lg" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <label for="email">Correo Electrónico</label>
                                                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control input-lg" required>
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
                                            <div class="col-md-6">
                                                <label for="password">Contraseña</label>
                                                <input type="password" id="password" name="password" class="form-control input-lg" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password-confirm">Repetir Contraseña</label>
                                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control input-lg" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-rs360-deep-blue btn-transparent pull-right mb-xl" data-loading-text="Cargando...">
                                                <i class="fa fa-plus"></i>&nbsp;Registrar
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
                    <h5>¿Ya tienes una cuenta?</h5>
                    <a href="{{ route('login') }}" class="btn btn-warning btn-transparent"><i class="fa fa-share-square-o"></i>&nbsp;Ingresar</a>
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
