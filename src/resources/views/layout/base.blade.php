<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
        <!--Fichier du bandeau commun en haut-->
        @yield('header')
        <!--Fichier qui contient le formulaire-->
        @yield('content')        
    </body>

</html>