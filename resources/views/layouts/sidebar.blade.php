{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><a href="#">Conta</a></li>
                <li><a href="#">Config</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2">
                        <a href="#" class="btn btn-success" id="menu-toggle">Toggle Menu</a>
                        <h1>Sidebar Layout</h1>
                        <p>Oi oioi dsasdsadasdasdsadasdas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu toggle script -->
    <script>
        $("#menu-toggle").click( function (e) {
           e.preventDefault();
           $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>

    <!--
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">

            <div class="navbar-header">
                <a href="#" class="navbar-brand">ASATEC</a>
            </div>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="active"><a href="#">Home</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Usuario</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <h3> layout de 3 colunas </h3>
        <div class="row">
            <div class="col-md-4" style="background-color: #1b4b72">esquerda</div>
            <div class="col-md-4" style="background-color: #b9bbbe">meio</div>
            <div class="col-md-4" style="background-color: #fff6a1">direita</div>
        </div>


                            <p>classes
        <p>xs - telefone
        <p>sm - tablet
        <p>md - desktop normal
        <p>lg - telas grandes(imac)
        <p><mark>'container-fluid'</mark> faz o conteudo abranger toda a tela(fullscreen)
        <blockquote class="blockquote">
            <p>Empresário de Sucesso.</p>
            <footer class="blockquote-footer">Felipe Arraes</footer>
        </blockquote>
        -->

</body>
</html>