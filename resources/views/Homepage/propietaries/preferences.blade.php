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
                        <div class="col-xs-12">
                            @include('Homepage.propietaries.sections.form_preferences',['url' => 'preferencias-propietarios', 'method' => 'POST', 'btn_submit'=>'Guardar Preferencias'])
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