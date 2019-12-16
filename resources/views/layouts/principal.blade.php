<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Beach Hotel Ines &mdash; MultiServicios</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css_II/font/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css_II/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_II/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css_II/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_II/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_II/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css_II/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('css_II/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('css_II/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css_II/style.css')}}">
    @stack('styles')

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-1 bg-black js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2 contenedor">
            <h1 class="mb-0 site-logo"><a href="{{url('/')}} " class="text-black mb-0 text-cursiva"><img class="text-danger mt-1" src="{{url('img/hotel_logo.jpg')}}" style="width: 100px; height: 80px;"></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                    @guest
                    <li><a href="{{url('/')}} " class="nav-link text-white">INICIO</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" id="menu" data-toggle="dropdown" class="nav-link text-white dropdown-toggle">BEACH HOTEL INES</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="text-black" href="">HABITACIONES</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">DEPARTAMENTOS</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">SUITES</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">BUNGALOWS</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">RESTAURANTE</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">SERVICIOS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase" href="{{ route ('galeria')}}">GALERIA</a>
                    </li>
                    <li><a href="/#services-section" class="nav-link text-white text-uppercase">Categorias</a></li>
                    <li><a href="/#contact-section" class="nav-link text-white text-uppercase">Contactanos</a></li>
                    <li><a class="nav-link text-white text-uppercase" href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li><a class="nav-link text-white text-uppercase" href="{{ route('register') }}">Registro</a></li>
                    @endif
                    @else
                    <li><a href="{{url('/')}} " class="nav-link text-black">INICIO</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" id="menu" data-toggle="dropdown" class="nav-link text-black dropdown-toggle">BEACH HOTEL INES</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="text-black" href="">HABITACIONES</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">DEPARTAMENTOS</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">SUITES</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">BUNGALOWS</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">RESTAURANTE</a>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li class="dropdown-item">
                                <a class="text-black" href="">SERVICIOS</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/#services-section" class="nav-link text-black">CATEGORIAS</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle text-black text-uppercase" href="" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-item">
                                  <a class="text-dark" href=" {{url('/home')}} ">Reservas</a>
                            </li>
                            @if (Auth::user()->admin)
                            <li class="dropdown-item">
                                <a class="text-dark" href=" {{route('products')}} ">Gestionar Habitaciones</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="text-dark" href=" {{route('mensajeria')}} ">Mensajeria</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="text-dark" href=" {{route('categories')}} ">Gestionar Categorias</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="text-dark" href=" {{route('users')}} ">Gestionar Usuarios</a>
                            </li>
                            <!-- <li class="dropdown-item">
                                <a class="text-dark" href=" {{route('prices')}} ">Gestionar Precios</a>
                            </li> -->
                            <li class="dropdown-item">
                                <a class="text-dark" href=" {{url('/admin/profile')}} ">Perfil</a>
                            </li>
                            @endif
                            <li class="dropdown-item">
                                <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                     <li>
                        <a href="{{url('/home')}} " class="nav-link text-white">
                            <i class="material-icons">shopping_cart</i>
                        </a>
                    </li>
                    @endguest
                </ul>
            </nav>
          </div>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3 text-white"></span></a></div>

        </div>
      </div>

    </header>
    <div class="site-wrap">
        @yield('content')
    </div>
     @include('includes.footer')
    </div>
    <!-- .site-wrap -->
    @stack('scripts')
    <<script src="{{asset('js_II/jquery-3.3.1.min.js')}}"></script>
    <<script src="{{asset('js_II/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js_II/jquery-ui.js')}}"></script>
    <script src="{{asset('js_II/popper.min.js')}}"></script>
    <!-- <script src="{{asset('style-payments/js/popper.min.js')}}"></script> -->
    <script src="{{asset('js_II/bootstrap.min.js')}}"></script>
    <!-- <script src="{{asset('style-payments/js/bootstrap.min.js')}}"></script> -->
    <script src="{{asset('js_II/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js_II/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js_II/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js_II/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js_II/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js_II/aos.js')}}"></script>
    <script src="{{asset('js_II/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js_II/jquery.sticky.js')}}"></script>
    <script src="https://kit.fontawesome.com/3a8f3b3502.js" crossorigin="anonymous"></script>
    <script src="{{asset('js_II/main.js')}}"></script>
    <!--   Core JS Files   -->
    <script src="{{asset('js/calificacion.js')}} " type="text/javascript"></script>

  </body>
</html>