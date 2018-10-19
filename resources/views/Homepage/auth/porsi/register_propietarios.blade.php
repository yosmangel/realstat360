@extends('layouts.app')
@section('title','Registro Propietario')
@section('content')
    <div class="container">
        <div class="featured-boxes separador-lg">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="featured-box featured-box-primary align-left mt-xlg">
                        <div class="box-content">
                            <h4 class="heading-primary text-uppercase mb-md">Registro de PROPIETARIO</h4>
                            <form action="/" id="frmSignUp" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Correo Electrónico</label>
                                            <input type="text" value="" class="form-control input-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Contraseña</label>
                                            <input type="password" value="" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Repetir Contraseña</label>
                                            <input type="password" value="" class="form-control input-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Registrar" class="btn btn-primary pull-right mb-xl" data-loading-text="Cargando...">
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
                    <h5>¿Ya tienes una cuenta?</h5>
                    <a href="{{ route('login') }}" class="btn btn-warning"><i class="fa fa-share-square-o"></i>&nbsp;Ingresar</a>
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