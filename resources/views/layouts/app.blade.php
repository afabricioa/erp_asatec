<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('imgs/asatecicon.ico')}}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    {{-- <script src="{{ asset('js/bootstrap.js') }}" ></script> --}}
    
    <!-- Datatable --> 
    <script src="{{ asset('js/datatable/datatables.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.html5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatable.css')}}" rel="stylesheet">
    
     
    
</head>
<body>
    <div id="app">
        {{-- @auth
            
        @else
            <nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ASATEC') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endauth --}}

        <main>
            @auth
                <div id="wrapper">
                    <!-- Sidebar -->
                    <div id="sidebar">
                        <div class="sidebar-header">
                            <h3><span style="color: orange">ASA</span><span style="color: blue">TEC</span></h3>
                            <strong>ASA</strong>
                        </div>

                        <ul class="list-unstyled components">
                            <li>
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                <a href="#menuCliente" data-toggle="collapse" class="dropdown-toggle">
                                    <i class="fas fa-users"></i>
                                    Cliente
                                </a>
                                <ul class="collapse list-unstyled" id="menuCliente">
                                    <li>
                                        <a href="{{ route('cliente.create') }}">Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cliente.index')}}">Listar</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('empreendimento.index')}}">
                                    <i class="fas fa-city"></i>
                                    Empreendimento
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contrato.index') }}">
                                    <i class="fas fa-file-contract"></i>
                                    Contrato
                                </a>
                            </li>
                        </ul>

                        <ul class="list-unstyled">
                            <li class="centro">
                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-power-off"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    <!-- Page Content -->
                    <div id="content">
                         {{-- @yield('content') --}}
                        <div id="dismiss">
                            <i class="fas fa-bars" id="fechar"></i>
                            <i class="fas fa-arrow-right" id="abrir"></i>
                        </div>

                        <div class="container">
                            @yield('content')
                        </div>

                        <script type="text/javascript">
                            $('.collapse').on('click', function (){
                                $('#menuCliente.in').toggleClass('in');
                            });
                           $('#dismiss').on('click', function () {
                                $('#sidebar').toggleClass('active');
                                $('#content').toggleClass('active');
                            });

                        </script>
                    </div>
                </div>    

            @else
                <div id="conteudoLogout">
                    @yield('content')
                </div>
            @endauth
            
        </main>
    </div>
</body>
</html>


