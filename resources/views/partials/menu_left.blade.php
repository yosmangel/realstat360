<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            MENU
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main">
                <ul class="nav nav-main">
                    <!--<li class="nav-active">
                        <a href="/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>PORTAL</span>
                        </a>
                    </li>-->
                    <li class="nav-active">
                        <a href="/home">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                            <span>INICIO RS360</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-building" aria-hidden="true"></i>
                            <span>INMUEBLES</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('inmuebles.index') }}">
                                        Lista Inmuebles
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inmuebles.create') }}">
                                    Nuevo Inmueble
                                </a>
                            </li>
                            <!--<li>
                                <a href="{{ route('promociones.index') }}">
                                    Lista Promociones
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('promociones.create') }}">
                                    Nueva Promoci&oacute;n
                                </a>
                            </li>-->
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>CLIENTES</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('clientes.index') }}">
                                        Lista de Clientes
                                </a>
                            </li>
                           <!-- <li>
                                <a href="{{ route('clientes.create') }}">
                                        Agregar Cliente
                                </a>
                            </li>-->
                        </ul>
                    </li>
                    <!--<li class="nav-parent">
                        <a>
                            <i class="fa fa-search"></i>
                            <span>DEMANDAS</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('demandas.index') }}">
                                        Lista de Demandas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('demandas.create') }}">
                                        Nueva Demanda
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                            <span>ACCIONES</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('acciones.index') }}">
                                        Lista de Acciones
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('acciones.create') }}">
                                        Crear Acción
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('acciones.agenda') }}">
                                        Agenda
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-map-o" aria-hidden="true"></i>
                            <span>PUBLICIDAD</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="#">
                                        Lista de Medios
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        Gestión de Emails
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        Captación
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                            <span>ESTADÍSTICAS</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>AGENTES</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('agentes.index') }}">
                                    Lista
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('agentes.create') }}">
                                    Nuevo Agente
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::user()->admin())
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-black-tie" aria-hidden="true"></i>
                            <span>AGENCIA</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('agencias.create') }}">
                                        Datos de la Agencia
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        Documentación de Agencia
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                            <span>HERRAMIENTAS</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="#">
                                        Preferencias del usuario
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        Documentación de ayuda
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        Gestor web
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    -->
                   
                </ul>
            </nav>
        </div>
        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                        sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
    </div>
</aside>
<!-- end: sidebar -->