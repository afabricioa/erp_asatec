<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>

        <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">


    </head>
    <body>
        <div id="restrita">
            Área restrita, e necessário fazer o 
            <br><a style="color: #f49332" href="/">Login</a>
        </div>
    </body>
</html>
