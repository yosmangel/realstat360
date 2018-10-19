@extends('Homepage.layouts.app')
@section('title', 'Gestion Comercial')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content')
    <div class="body">
            @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.propietaries.sections.title_and_breadcrumbs', ['title' => 'Gestión Comercial','path' => '/panel-propietario'])
                    <div class="container">
                        <div class="row">
                            <hr>
                            <h4>PUBLICA EN LOS SIGUIENTES MEDIOS&nbsp;</h4>
                            <br>
                            <div class="pricing-table ">
                                <div class="col-md-3">
                                    <div class="plan most-popular">
                                        <a href="www.vibbo.com"><h3>www.vibbo.com</h3></a>
                                        <img src="{{ asset('img/gestion/vibbo_portada.jpg') }}" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="col-md-3 center">
                                    <div class="plan ">
                                        <a href="www.idealista.com"><h3>www.idealista.com</h3></a>
                                        <img src="{{ asset('img/gestion/idealista_portada.jpg') }}"class="img-thumbnail" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="plan most-popular">
                                        <a href="www.fotocasa.es/es"><h3>www.fotocasa.es/es</h3></a>
                                        <img src="{{ asset('img/gestion/fotocasa_portada.jpg') }}"class="img-thumbnail" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="plan">
                                        <a href="www.mislocales.esmislocales"><h3>www.mislocales.es</h3></a>
                                        <img src="{{ asset('img/gestion/mislocales_portada.jpg') }}" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>GESTION COMERCIAL&nbsp;</h4>
                        <div class="row ">
                            <div class="col-xs-12 col-md-4" >
                                <div class="card top-md">
                                    <div class="card-content text-center" style="min-height: 300px;">
                                                <img src="{{ asset('img/gestion/cartel.png') }}" class="img-thumbnail">
                                                <div class="caption text-center">
                                                    <h2><span class="label label-info">Carteles</span></h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, quo.</p>
                                                    <p>
                                                        <a href="#" class="btn btn-primary" role="button">
                                                            Detalles&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        </a>  
                                                    </p>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4" >
                                <div class="card top-md">
                                    <div class="card-content text-center" style="min-height: 300px;">
                                        <img src="{{ asset('img/gestion/valoracion.png') }}" class="img-thumbnail">
										<div class="caption text-center">
											<h2><span class="label label-warning">Valoración</span></h2>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, maxime.</p>
				        					<p>
				        						<a href="#" class="btn btn-primary" role="button">
				        							Detalles&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				        						</a> 
				        					</p>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4" >
                                <div class="card top-md">
                                    <div class="card-content text-center" style="min-height: 300px;">
                                        <img src="{{ asset('img/gestion/tasacion.png') }}" class="img-thumbnail">
										<div class="caption text-center">
											<h2><span class="label label-warning">Tasación</span></h2>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, molestiae.</p>
				        					<p>
				        						<a href="#" class="btn btn-primary" role="button">
				        							Detalles&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				        						</a> 
				        					</p>
										</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                <hr>
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection 