@extends('layouts.app')
@section('title', 'Preferencias de Acceso a las Propiedades')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/theme-admin-extension.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/skins/extension.css') }}">
@endsection
@section('content') 
    <div class="body">
            @include('partials.header') 
            <div role="main" class="main">
                @include('properties.sections.title_and_breadcrumbs')
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            @include('properties.form_preferences',['url' => 'preferencias', 'method' => 'POST', 'btn_submit'=>'Guardar Preferencias'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-tertiary">
                                <strong>Well done!</strong> You are using a awesome template! <a href="" class="alert-link">Say Hi to Porto </a>.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-info alert-admin">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p><strong class="warning"><i class="fa fa-warning"></i> ¡Atención!</strong> 
                                            Al definir las Preferencias para la publicación de sus inmuebles debe 
                                            tener en cuenta que otros usuarios podrán encontrarlos en la plataforma
                                            si las características del inmueble coinciden con los 
                                            parámetros de la búsqueda que haya introducido el demandante, 
                                            y sumado esto a que los usuarios demandantes cumplan los requerimientos 
                                            que usted establezca aquí.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
       @include('partials.footer')
    </div>
@endsection 
@section('js')
    <!-- Specific Page Vendor -->
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script src="{{ asset('admin/assets/javascripts/theme.admin.extension.js') }}"></script>
    <script src="{{ asset('admin/assets/javascripts/forms/examples.advanced.form.js') }}"></script>

    <script src="{{ asset('js/preferences.js') }}"></script>
@endsection
