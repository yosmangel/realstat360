<div class="container bottom-md">
	<div class="row">
		<div class="col-md-12 center pb-xl">
			<!--h2 class="mt-xlg pt-md mb-none"><strong>Bienvenido</strong> {{ Auth::user()->name }}</h2-->
			<p class="lead">Todas las facilidades para ...<span class="alternative-font font-size-xl">&nbsp;encontrar los Inmuebles de tu preferencia!</span></p>
		</div>
	</div>
	<div class="row">
        <div class="col-md-4">
            <div class="feature-box feature-box-style-2 reverse mb-xl appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                <div class="feature-box-icon">
                    <i class="fa fa-bolt"></i>
                </div>
                <div class="feature-box-info">
                    <h4 class="mb-sm">Establece tus Preferencias {{ currentUser()->name }}</h4>
                    <p class="mb-lg">Encuentra lo que estás buscando a través de <a href="{{ route('preferencias-demanda') }}"><strong><em>Editar tu Preferencias</em></strong></a>.</p>
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
                    <h4 class="mb-sm">Resultados de Búsqueda.</h4>
                    <p class="mb-lg">Revisa los resultados y contacta a los propietarios <a href="#"><strong><em>Panel de Contacto</em></strong></a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
