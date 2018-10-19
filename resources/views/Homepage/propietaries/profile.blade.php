
@extends('Homepage.layouts.app')
@section('title', 'Preferencias de Búsqueda de Inmuebles')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/theme-admin-extension.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/skins/extension.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content') 
    <div class="body">
            @include('Homepage.partials.header') 
            <div role="main" class="main">
                
                @include('Homepage.partials.title_and_breadcrumbs', ['title' => $title,'path' => 'panel-demanda'])
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8">
                            <form autocomplete="off" id="submit_property_form" name="new_post" method="post" action="" enctype="multipart/form-data" class="add-frontend-property">
                                        {{ csrf_field() }}
                                        <div class="account-block form-step active">
                                            <div class="add-title-tab">
                                                <h3>DATOS PERSONALES Y PREFERENCIAS</h3>
                                                <div class="add-expand"></div>
                                            </div>
                                            <div class="add-tab-content">
                                                <div class="add-tab-row push-padding-bottom">
                                                    <div class="row">
                                                        <!-- AVATAR -->
                                                        <div class="col-xs-12 col-sm-5">
                                                                <div class="form-group">
                                                                    <input id="avatar" name="avatar" type="file" class="file-loading" accept="img/iconos/user.png" value="{{ asset('img/iconos/user.png') }}">
                                                                        @if(($user->avatar) !== "")
                                                                            <script>
                                                                                $(document).ready(function() {
                                                                                    $("#avatar").fileinput({
                                                                                        theme: "gly",
                                                                                        showCaption: true,
                                                                                        initialPreview: ["<img src='{{ asset("img/avatars/".$user->avatar) }}' class='img-responsive'>",]
                                                                                    });
                                                                                });
                                                                            </script>
                                                                        @endif
                                                                        @if( $user->avatar == "" || $user->avatar == null )
                                                                            <script> 
                                                                                $(document).ready(function() {
                                                                                    $("#avatar").fileinput({
                                                                                        theme: "gly",
                                                                                        showCaption: true,
                                                                                        initialPreview: ["<img src='{{ asset("img/iconos/user.png") }}' class='img-responsive'>",  ]
                                                                                    });
                                                                                });
                                                                            </script>
                                                                        @endif
                                                                </div>
                                                        </div>
                                                        <!-- DATOS PERSONALES -->
                                                        <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label for="prop_price">Nombre</label>
                                                                <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label for="prop_sec_price">Apellidos</label>
                                                                <input type="text" id="lastname" value="{{ $user->lastname }}" class="form-control" name="lastname" placeholder="Apellidos" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label for="prop_label">Teléfono</label>
                                                                <input type="text" id="telephone" class="form-control" value="{{ $user->telephone }}" name="telephone" placeholder="Teléfono" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label for="prop_price_prefix">Perfil</label>
                                                                <select name="perfil_id" id="perfil_id" class="selectpicker bs-select-hidden" data-live-search="false" data-live-search-style="begins">
                                                                    <option selected="selected" value="{{ $perfil_actual->id }}">{{ $perfil_actual->name }}</option>
                                                                    @foreach($perfiles as $perfil)
                                                                            <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <!-- CONTACTAR CON-->
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">CONTACTAR CON</label>
                                                                <select name="perfiles_id[]" id="perfiles_id" multiple class="form-control select-items" required>
                                                                    @foreach($perfiles_seleccionados as $ps)
                                                                        <option selected value="{{ $ps->id }}">{{ $ps->name }}</option>
                                                                    @endforeach
                                                                    @foreach($perfiles as $perfil)
                                                                        <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <!-- TRATO CON PROPIETARIO DIRECTO O CON PROPIETARIOS E INTERMEDIARIOS -->
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="password">
                                                                    SOLO TRATAR                                                 
                                                                </label>
                                                                <blockquote>
                                                                    <div class="radio">
                                                                            <label >
                                                                                @if($user->directo)
                                                                                    <input type='radio' name='directo' value=1 checked>
                                                                                @else
                                                                                    <input type='radio' name='directo' value=1>
                                                                                @endif
                                                                                Propietario Directo
                                                                            </label>
                                                                    </div>
                                                                    <div class="radio">
                                                                            <label>
                                                                                    @if(!($user->directo))
                                                                                    <input type='radio' name='directo' value=0 checked>
                                                                                @else
                                                                                    <input type='radio' name='directo' value=0>
                                                                                @endif
                                                                                Todos
                                                                            </label>
                                                                    </div>
                                                                <small class="small-note">
                                                                        (* Si selecciona propietario directo solo encontrará inmuebles que hayan sido publicados por propietarios y no por intermediarios.)
                                                                </small>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                        <!-- INTERESADO EN VENTA/ALQUILER -->
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group">
                                                                <label for="password">INTERESADO EN</label>
                                                                <blockquote>
                                                                    <div class="checkbox">
                                                                            <label >
                                                                                <input type='hidden' value=0 name='venta'>
                                                                                @if($user->venta)
                                                                                    <input type='checkbox' name='venta' value=1 checked="checked">
                                                                                @else
                                                                                    <input type='checkbox' name='venta' value=1>
                                                                                @endif
                                                                                Compra y Venta
                                                                            </label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                            <label>
                                                                                <input type='hidden' value=0 name='alquiler'>
                                                                                    @if($user->alquiler)
                                                                                    <input type='checkbox' name='alquiler' value=1 checked="checked">
                                                                                @else
                                                                                    <input type='checkbox' name='alquiler' value=1>
                                                                                @endif
                                                                                Alquiler
                                                                            </label>
                                                                    </div>
                                                                <small class="small-note">
                                                                        (* Tendrá acceso a los inmuebles relativos al tipo de operación que selecciones aqui.)
                                                                </small>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-tab-content">
                                                <div class="add-tab-row push-padding-bottom">
                                                    <div class="col-sm-12">
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-background separador-10">
                                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                                    &nbsp;Guardar Datos
                                                                </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-info alert-admin">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p><strong class="warning"><i class="fa fa-warning"></i> ¡Atención!</strong> 
                                            Cuando otros usuarios realicen búsquedas de inmuebles en RS360, 
                                            solo los tipos de perfiles que usted defina aquí podrán encontrar 
                                            la información relativa a sus inmuebles.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('Homepage.demands.sections.form_demand')   
       @include('Homepage.partials.footer')
    </div>
@endsection 
@section('js')
    <!-- Specific Page Vendor -->
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script src="{{ asset('admin/assets/javascripts/theme.admin.extension.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection