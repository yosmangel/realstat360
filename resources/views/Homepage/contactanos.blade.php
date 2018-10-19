@extends('Homepage.layouts.app')
@section('title','Sistema Intermediación Oferta-Demanda')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content')
    <div class="body">
        @include('Homepage.partials.header')
        <div role="main" class="main">
			<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="alert alert-success hidden mt-lg" id="contactSuccess">
								<strong>¡Enhorabuena!</strong> Su mensaje ha sido enviado exitosamente. Pronto nos pondremos en contacto con usted para responder a su solicitud. 
							</div>
							<div class="alert alert-danger hidden mt-lg" id="contactError">
								<strong>¡Lo sentimos!</strong> Ha ocurrido un error al intentar enviar el mensaje.
								<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
							</div>
							<h2 class="mb-sm mt-sm"><strong>Contacta </strong>con nosotros</h2>
							<form id="contactForm" action="{{ route('contactanos') }}" method="POST">
								<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                <input type="hidden" name="_method" id="method" value="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-6">
											<label>Nombre *</label>
											<input type="text" value="" data-msg-required="Por favor scriba su nombre." maxlength="100" class="form-control" name="name" id="name" required>
										</div>
										<div class="col-md-6">
											<label>Correo Electrónico *</label>
											<input type="email" value="" data-msg-required="Por favor escriba su correo electrónico." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Asunto</label>
											<input type="text" value="" data-msg-required="Por favor, escriba el asunto del mensaje." maxlength="100" class="form-control" name="subject" id="subject" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Contenido del Mensaje *</label>
											<textarea maxlength="5000" data-msg-required="Por favor, escriba su mensaje." rows="10" class="form-control" name="description" id="description" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<button type="submit" id="btn-contact-us" class="btn btn-primary btn-lg mb-xlg">
												<i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-send-o i-shown" aria-hidden="true"></i>&nbsp;
												<span id="btn-txt">Enviar Mensaje</span>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<h4 class="heading-primary mt-lg">Haz tu <strong>Solicitud</strong></h4>
							<p>
								Si tienes interés de tener acceso al Software de Gestión de Inmuebles 
								para Profesionales puedes escribirnos enviándonos tu solicitud y te estaremos 
								respondiendo en breve tiempo.

								También puedes contactarnos a traves de nuestro correo electrónico o 
								llamándonos directamente.
							</p>
							<hr>
							<h4 class="heading-primary"><strong>RS</strong>360</h4>
							<ul class="list list-icons list-icons-style-3 mt-xlg">
								<li><i class="fa fa-map-marker"></i> <strong>Dirección:</strong> Madrid, España</li>
								<li><i class="fa fa-phone"></i> <strong>Teléfono:</strong> <strong>(91) 751-08-24</strong></li>
								<li><i class="fa fa-envelope"></i> <strong>Correo Electrónico:</strong> <a href="mailto:info@realstate360.com">info@realstate360.com</a></li>
							</ul>
							<hr>
						</div>
					</div>
				</div>
		</div>
		@include('Homepage.partials.footer')
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection 