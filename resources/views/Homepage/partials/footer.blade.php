<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-ribbon">
                <span>RS360</span>
            </div>
            <div class="col-md-3">
                <div class="newsletter">
                    <h5>ACCEDER</h5>
                    <ul class="menu-list text-uppercase">
                        <li><a href="{{ url('/ingresar/propietarios') }}">Propietarios</a></li>
                        <li><a href="{{ url('/ingresar/profesionales') }}">Profesionales</a></li>
                        <li><a href="{{ url('/ingresar/demanda') }}">Demanda</a></li>
                        <li><a href="#">Planes y Beneficios</a></li>
                        <li><a href="#">Políticas de Privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="rs360-details">
                    <h5>REALSTATE360</h5>
                    <ul class="menu-list">
                        <li><a href="#home-intro" data-hash>¿Cómo funciona?</a></li>
                        <li><a href="#home-intro" data-hash>¿Quiénes Somos?</a></li>
                        <li><a href="#home-intro" data-hash>¿Qué Hacemos?</a></li>
                        <li><a href="#home-intro" data-hash>Políticas de Uso</a></li>
                        <li><a href="#home-intro" data-hash>Políticas de Privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-details">
                    <h5>CONTÁCTANOS</h5>
                    <ul class="menu-list">
                        <li><i class="fa fa-map-marker"></i> <strong>Dirección:</strong> Madrid, España</li>
                        <li><i class="fa fa-phone"></i> <strong>Teléfono:</strong> (91) 751-08-24</li>
                        <li><i class="fa fa-envelope"></i> <strong>Correo Electrónico:</strong> <a href="mailto:info@realstate360.com">info@realstate360.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center" id="footer-logo">
                    <a href="{{ url('/') }}">
                        <img alt="RealState360 Logo" src="{{ asset('img/logo/logofooter1.png') }}" width="90px" height="80px">
                    </a>
                </div>
                <div class="col-md-6 text-center" id="footer-copyright">
                    <p id="text-copyright">© Copyright 2017. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-3 text-center" id="footer-login-register">
                    <nav >
                        <ul>
                            <li><a href="{{ url('/registro/propietarios') }}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Registro</a></li>
                            <li><a href="{{ url('/ingresar/propietarios')}}"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Entrar</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>