<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<div id="content">
		<h1>Bienvenue sur Charevent, {{$user->prenom}}!</h1>
		<p>Vous pouvez désormais vous <a href="{{route('connexion')}}">connecter</a> et accéder à toutes nos fonctionnalités!
		</p>
	</div>

</body>

</html>
