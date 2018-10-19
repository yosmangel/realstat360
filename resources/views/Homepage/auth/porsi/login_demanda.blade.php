@extends('layouts.app')
@section('title','Ingresar')
@section('content')
   <div class="container">
        <div class="featured-boxes separador-lg">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="featured-box featured-box-primary align-left mt-xlg">
                        <div class="box-content">
                            <h4 class="heading-primary text-uppercase mb-md">Ingreso de DEMANDA</h4>
                            <form action="/" id="frmSignIn" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>correo electrónico</label>
                                            <input type="text" value="" class="form-control input-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a class="pull-right" href="#">(¿Olvido su contraseña?)</a>
                                            <label>Contraseña</label>
                                            <input type="password" value="" class="form-control input-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="remember-box checkbox">
                                            <label for="rememberme">
                                                <input type="checkbox" id="rememberme" name="rememberme">Recordar acceso
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary pull-right mb-xl" data-loading-text="Cargando...">
                                            <i class="fa fa-sign-in"></i>&nbsp;Ingresar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  

            <!-- Aviso de Registro -->
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5>¿Aún no te has registrado?</h5>
                    <a href="{{ route('register') }}" class="btn btn-warning"><i class="fa fa-share-square-o"></i>&nbsp;Ir al Registro</a>
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
