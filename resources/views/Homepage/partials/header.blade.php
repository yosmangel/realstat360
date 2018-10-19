<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-57px', 'stickyChangeLogo': true}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img alt="Logo RS360" width="270" height="94" data-sticky-width="190" data-sticky-height="75" data-sticky-top="33" src="{{ asset('img/logo/rs_logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="header-column">
                    @if(!Auth::guest())
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="hidden-xs">
                                        <a href="{{ route('contactanos') }}"><i class="fa fa-angle-right"></i> Contáctanos</a>
                                    </li>
                                    <li>
                                        <span class="ws-nowrap"><i class="fa fa-phone"></i> (91) 751-08-24</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                    <div class="header-row">
                        <div class="header-nav">
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                <nav>
                                    <ul class="nav nav-pills">
                                        @if(!Auth::guest())
                                            @if(Auth::user()->user_type == 0)
                                                <li>
                                                    <a class="btn btn-lg btn-rs360-deep-blue btn-transparent" href="{{ route('panel-propietario') }}">
                                                       <i class="fa fa-building-o"></i>&nbsp;&nbsp;Mis Inmuebles
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-lg btn-rs360-deep-blue btn-transparent" href="{{ route('propietario-agenda') }}">
                                                       <i class="fa fa-book"></i>&nbsp;&nbsp;Agenda
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-lg btn-rs360-deep-blue btn-transparent" href="{{ route('propietarios-gestion-comercial') }}">
                                                       <i class="fa fa-desktop"></i>&nbsp;&nbsp;Gestión Comercial
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-lg btn-rs360-deep-blue btn-transparent" href="{{ route('propietarios-preferencias') }}">
                                                       <i class="fa fa-star"></i>&nbsp;&nbsp;Preferencias
                                                    </a>
                                                </li>
                                            @elseif(Auth::user()->user_type == 1)
                                                <li>
                                                    <a class="btn btn-rs360-deep-blue btn-lg btn-block" data-hash href="{{ url('/home') }}">
                                                       <i class="fa fa-cog"></i>&nbsp;&nbsp;Sistema de Gestion de Inmuebles
                                                    </a>
                                                </li>
                                            @elseif(Auth::user()->user_type == 2)
                                                <li>
                                                    <a class="btn btn-rs360-deep-blue btn-md btn-block" data-toggle="modal" data-target="#formDemandModal">
                                                       <i class="fa fa-search"></i>&nbsp;&nbsp;Encuentra Inmuebles
                                                    </a>
                                                     
                                                </li>
                                                <li>
                                                    <a class="btn btn-info btn-lg btn-block" href="#">
                                                       <i class="fa fa-comments"></i>&nbsp;&nbsp;Propietarios Contactados
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a class="btn btn-rs360-deep-blue btn-lg btn-block" href="{{ route('perfil') }}">
                                                    <i class="fa fa-user"></i>&nbsp;&nbsp;Perfil
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-danger btn-lg btn-block" href="/logout">
                                                    <i class="fa fa-power-off"></i>&nbsp;&nbsp;Salir
                                                </a>
                                            </li>
                                        @else
                                        <div class="btn-group" role="group" aria-label="...">
                                          <button type="button" class="btn btn-default btn-lg"><i class="fa fa-phone"></i> <strong>(91) 751-08-24</strong></button>
                                          <a type="button" href="{{ route('contactanos') }}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i>&nbsp;&nbsp;Contáctanos</a>
                                        </div>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Para versiones superiores a 5.3 onclick="event.preventDefault(); document.getElementById('formLogout').submit();"-->