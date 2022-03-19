<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div id="content">
        <h1>Votre nouveau mot de passe</h1>
        <p>Veuillez vous <a href="{{route('pageConnexion')}}">connecter</a> à l'aide de ce mot de passe afin de rapidement le modifier. Le voici:
            {{$password}}

        </p>

    </div>

</body>

</html>