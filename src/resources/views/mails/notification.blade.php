<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<div id="content">
		<h1>Bonjour {{$destinataire->prenom}},</h1>
		<p>
            Vous avez reçu une nouvelle notification :
		</p>
        <p>
            {{$message}}
        </p>
        <p>
            Vous pouvez vous rendre dans votre centre de notification en <a href="{{route('pageNotification')}}">cliquant ici</a>.
        </p>
        <p>
            Vous recevez des emails concernant vos notifications car vous avez choisis d'activer l'envoi de nos notifications par mails.
            Si vous souhaitez changer cela, vous pouvez <a href={{route('modifierCompte')}}>modifier votre profil</a>.
        </p>
	</div>

</body>

</html>
