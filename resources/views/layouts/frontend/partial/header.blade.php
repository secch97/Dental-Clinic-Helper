<div id="preloader">
    <div class="preload-content">
        <div id="dento-load"></div>
    </div>
</div>
<header class="header-area">
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <div class="col-6 col-md-9 col-lg-8">
                    <div class="top-header-content">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" style="font-family:Montserrat;"
                            title="CP, 1101 Calle Los Sisimiles, #3007, Colonia Miramonte, San Salvador"><i class="fa fa-map-marker"></i> 
                            <span>CP, 1101 Calle Los Sisimiles, #3007, Colonia Miramonte, San Salvador</span></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" style="font-family:Montserrat;"
                            title="info.miramontedental@gmail.com"><i class="fa fa-envelope"></i> <span><span
                                    class="__cf_email__"
                                    data-cfemail="670e09010849030209130827000a060e0b4904080a">info.miramontedental@gmail.com</span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">

                <nav class="classy-navbar justify-content-between" id="dentoNav">

                    <a class="nav-brand" href="{{ route('Principal') }}"><img
                            src="{{asset('assets/frontend/images/core-img/logo.png')}}" alt=""></a>

                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <div class="classy-menu">

                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="{{ route('Principal') }}">Inicio</a></li>
                                <li><a href="{{ route('SobreNosotros') }}">Sobre nosotros</a></li>
                                <li><a href="{{ route('Servicios') }}">Servicios</a></li>
                                <li><a href="{{ route('Contacto') }}">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                    @guest

                    <a href="{{ route('login') }}" class="btn dento-btn booking-btn">Iniciar Sesión</a>
                    @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="btn dento-btn booking-btn">Registrarse</a>
                    @endif
                    @else
                    @if (Auth::user()->Role_id==1)
                    <a href="{{ route('Administrador') }}" class="btn dento-btn booking-btn">Gestión de clínica</a>
                    @else
                    <a href="{{ route('MiCuenta') }}" class="btn dento-btn booking-btn">Mi cuenta</a>
                    @endif
                    <a class="btn dento-btn booking-btn" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
            </div>
        </div>
    </div>
</header>
<section class="welcome-area">
</section>
