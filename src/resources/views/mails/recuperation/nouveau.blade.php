<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<div id="content">
		<h1>Votre nouveau mot de passe : </h1> <strong>{{$password}}</strong>
		<p>Veuillez vous <a href="{{route('connexion')}}">connecter</a> à l'aide de ce mot de passe afin de rapidement le modifier
		</p>
	</div>
</body>
</html>