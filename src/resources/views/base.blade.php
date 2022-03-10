<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    </head>

    <body>
        @yield('content')
        
    </body>

</html>