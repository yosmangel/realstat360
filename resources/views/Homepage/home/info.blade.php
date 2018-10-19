 <section class="section section-default section-with-mockup">
    <div class="container">
        <div class="row">
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
                <div class="separador-md">
                    <img src="{{ asset('images/logo/logo_big.png') }}" class="img-responsive mockup-landing-page mb-xl appear-animation" alt="RS360 Logo" data-appear-animation="zoomIn" data-appear-animation-delay="300">
                </div>
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
</section>