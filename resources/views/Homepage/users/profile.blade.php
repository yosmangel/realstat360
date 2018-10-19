
@extends('Homepage.layouts.app')
@section('title', 'Preferencias de Búsqueda de Inmuebles')
@section('css')
    <link rel="stylesheet" href="{{ asset('front/css/checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection

@section('content') 
    <div class="body">
            @include('Homepage.partials.header') 
            <div role="main" class="main">
                
                @include('Homepage.partials.title_and_breadcrumbs', ['title' => $title,'path' => 'panel-demanda'])
                <div class="container">
                    <div class="row"> 
                        <div class="col-xs-12">
                            <form id="profileForm" method="POST" action="{{ url('perfil-actualizar/'.$user->id) }}" enctype="multipart/form-data">
                                        <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                        <input type="hidden" name="_method" value="POST">
                                        <div class="account-block form-step active">
                                            <div class="add-title-tab">
                                                <h3>INFORMACIÓN DEL USUARIO</h3>
                                                <div class="add-expand"></div>
                                            </div>
                                            <div class="add-tab-content">
                                                <div class="add-tab-row push-padding-bottom">
                                                    <div class="row">
                                                        <!-- AVATAR -->
                                                        <div class="col-xs-12 col-sm-3">
                                                                <div class="form-group">
                                                                    <!-- inmueble Post Image  -->
                                                                    @if($user->avatar !== "")
                                                                        <img src="{{ asset('img/avatars/'.$user->avatar) }}" alt="" class="img-responsive img-thumbnail" accept="img/iconos/user.png" value="{{ asset('img/iconos/user.png') }}">
                                                                    @endif
                                                                    @if( $user->avatar == "" || $user->avatar == null )
                                                                        <img src="{{ asset('img/avatars/user.png') }}" alt="Icono User" class="img-responsive img-thumbnail" accept="img/iconos/user.png" value="{{ asset('img/iconos/user.png') }}">
                                                                    @endif
                                                                        <div class="form-group label-floating">
                                                                            <label for="image" class="control-label">Imagen de Portada</label>
                                                                            <input id="image" name="avatar" type="file" class="file-loading" >
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- DATOS PERSONALES -->
                                                        <div class="col-xs-12 col-sm-5">
                                                            <h4 class="mb-xlg">Datos Personales</h4>
                                                            <div class="form-group">
                                                                <label for="name" class="control-label">Nombre</label>
                                                                <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nombre" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname" class="control-label">Apellidos</label>
                                                                <input type="text" id="lastname" value="{{ $user->lastname }}" class="form-control" name="lastname" placeholder="Apellidos" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telephone" class="control-label">Teléfono</label>
                                                                <input type="text" id="telephone" class="form-control" value="{{ $user->telephone }}" name="telephone" placeholder="Teléfono" required>
                                                            </div>
                                                        </div>
                                                        <!-- CAMBIO DE CLAVE -->
                                                        <div class="col-xs-12 col-sm-4">
                                                            <h4 class="mb-xlg">Cambiar Contraseña</h4>
                                                            <div class="form-group">
                                                                <label class="control-label" for="password">Nueva Contraseña</label>
                                                                <input type="password" class="form-control" id="password" name="password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="password-confirmation">Repetir Contraseña</label>
                                                                <input type="password" class="form-control" id="password-confirmation" name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="add-tab-content">
                                                <div class="add-tab-row push-padding-bottom">
                                                    <div class="col-sm-12">
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary btn-create-property pull-right">
                                                                <i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-search i-shown"></i>&nbsp;<strong><span id="btn-txt">Actualizar</span></strong>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div><br>
                </div>
            </div>
            @include('Homepage.demands.sections.form_demand')   
       @include('Homepage.partials.footer')
    </div>
@endsection 
@section('js')
    <!-- Specific Page Vendor -->
    <script src="{{ asset('vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection