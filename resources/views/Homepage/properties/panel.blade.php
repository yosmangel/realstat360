<div class="container bottom-md">
	<div class="row">
		<div class="col-md-12 center">
			<h2 class="mt-xlg pt-md mb-none"><strong>Bienvenido</strong> {{ Auth::user()->name }}</h2>
			<p class="lead">Todas las facilidades para ...<span class="alternative-font font-size-xl">&nbsp;administrar y comercializar tus Inmuebles!</span></p>
		</div>
	</div>
	<div class="row top-md">
        <div class="col-md-4">
            <div class="feature-box feature-box-style-2 reverse mb-xl appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                <div class="feature-box-icon">
                    <i class="fa fa-bolt"></i>
                </div>
                <div class="feature-box-info">
                    <h4 class="mb-sm">Añade nuevos inmuebles</h4>
                    <p class="mb-lg">Da de alta a tus inmuebles accediendo a la sección de <a href="{{ route('propiedades.create') }}"><strong><em>Alta de Inmuebles</em></strong></a>.</p>
                </div>
            </div> 
        </div>
        <div class="col-md-4">
                <img src="{{ asset('img/logo/logo_big.png') }}" class="img-responsive appear-animation" alt="RS360 Logo" data-appear-animation="zoomIn" data-appear-animation-delay="300">
        </div>
        <div class="col-md-4">
            <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="300">
                <div class="feature-box-icon">
                    <i class="fa fa-wrench"></i>
                </div>
                <div class="feature-box-info">
                    <h4 class="mb-sm">Administra tus Propiedades.</h4>
                    <p class="mb-lg">Accede a nuestras herramientas profesionales y <a href="{{ route('propiedades.index') }}"><strong><em>Administra tus Inmuebles</em></strong></a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
