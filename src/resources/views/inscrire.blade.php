<!DOCTYPE html>
<html>

    <head>
        <title>S'inscrire</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    </head>
    <body>
        <!--Fichier du bandeau commun en haut-->
        @include('layout.barreMenu1', ['user' => $user ?? ''])
        <!--Fichier qui contient le formulaire-->
        @yield('content')        
    </body>

</html>