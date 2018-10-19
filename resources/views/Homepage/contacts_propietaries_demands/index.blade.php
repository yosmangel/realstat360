@extends('Homepage.layouts.app')
@section('title', 'Demanda de Inmuebles')
@section('content')
    <div class="body">
            @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.partials.title_and_breadcrumbs', ['path' => 'panel-propietario','title' => 'Inmuebles Demandados'])
                <div class="container">
                    @if(Auth::user()->user_type == 0)
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="list-group">
                                    @foreach($inmuebles as $inmueble)
                                        <div class="list-group-item">
                                            <span class="thumb-info thumb-info-side-image thumb-info-no-zoom">
                                                <span class="thumb-info-side-image-wrapper">
                                                    <img src="{{ asset('files_img/'.$inmueble->id_portada) }}" alt="Portada del Inmueble" height="140px" style="width: 200px">
                                                </span>
                                                <span class="thumb-info-caption">
                                                    <span class="thumb-info-caption-text">
                                                        <h4 class="text-uppercase mb-xs">{{ $inmueble->inmueble->nombre }}</h4>
                                                        <h5>
                                                            @if($inmueble->inmueble->modalidad)
                                                                @if($inmueble->inmueble->modalidad->venta)
                                                                    Operación: <strong>Venta</strong>
                                                                @endif
                                                                @if($inmueble->inmueble->modalidad->alquiler_residencial)
                                                                    Operación: <strong>Alquiler</strong>
                                                                @endif
                                                                @if($inmueble->inmueble->modalidad->compartir)
                                                                    Operación: <strong>A compartir</strong>
                                                                @endif
                                                            @endif
                                                        </h5>
                                                        <h5>1 Usuario interesados en este inmueble. 
                                                            <a href="" class="btn btn-warning btn-sm">
                                                                <i class="fa fa-handshake-o" aria-hidden="true"></i> 
                                                            &nbsp;<strong>Contactar</strong></a>
                                                        </h5>
                                                </span>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-4">
                                    <section class="call-to-action call-to-action-primary button-centered mb-xl">
                                        <div class="call-to-action-content">
                                            <h4 class="text-white text-padding-md">Los Inmuebles mostrados coinciden con los criterios de 
                                                búsqueda de los usuarios demandantes.
                                                Sus inmuebles serán encotrados en las búsquedas que 
                                                realicen otros usuarios, en correspondencia con las 
                                                <strong>Preferencias</strong> que usted haya establecido.</h4>
                                        </div>
                                        <div class="call-to-action-btn">
                                            <a href="{{ route('propietarios-preferencias') }}" class="btn btn-rs360-deep-blue btn-lg btn-default">Preferencias</a>
                                        </div>
                                        <br>
                                    </section>
                            </div>
                        </div>
                    @elseif(Auth::user()->user_type == 1)
                     
                   	@endif
               </div>
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection 