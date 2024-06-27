<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title>Menú lateral responsive - MagtimusPro</title>-->
    <title>{{ config('app.name', 'Laravel_menu') }}</title>

    
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <!--link de api arcgis<script src="https://js.arcgis.com/4.28/"></script>-->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/css/estilos.css', 'resources/js/script.js','resources/js/bootstrap.js'])
    @yield('js')

    <!--arcgis-->
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    
    <!--no borrar-->
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">      <!--id=body es para que el menu se contraiga, tiene relacion con js y css-->
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            
        </div>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto " id="navbar-nav">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

        
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fab fa-youtube"></i>
            <h4>MagtimusPro</h4>
        </div>

        <div class="options__menu">	

            <a href="{{url('hruta')}}" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Calendario</h4>
               </div>
            
            </a>  

            <a href="{{url('iniciativa_r')}}">
                <div class="option">
                    <i class="far fa-file" title="Portafolio"></i>
                    <h4>Iniciativa</h4>
                </div>
            </a>
            
            <a href="{{url('geoini')}}">
                <div class="option">
                    <i class="fas fa-video" title="Cursos"></i>
                    <h4>georeferencia</h4>
                </div>
            </a>

            <a href="{{url('ambito')}}">
                <div class="option">
                    <i class="far fa-sticky-note" title="Blog"></i>
                    <h4>Ambito</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4></h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

        </div>

    </div>

    <main>
        @yield('content')
    </main>
     
    <!--api arcgis-->
    <script src="https://js.arcgis.com/4.28/"></script>

    
</body>
</html>