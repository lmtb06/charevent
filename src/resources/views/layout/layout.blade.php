<!DOCTYPE html>
<html class="h-full" lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('titre')</title>
</head>

<body class="bg-blue-200 h-full">
    @if (Auth::check())
        @include('bandeau', ['user' => $user])
    @endif
    @yield('content')
</body>

</html>