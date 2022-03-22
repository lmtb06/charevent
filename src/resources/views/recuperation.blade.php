<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div id="content">
        <h1>Mot de passe oublié?</h1>
        <p>Un mot de passe temporaire vous sera envoyer par email.
            Attention, si nous ne reconnaissons pas votre adresse e-mail, vous ne recevrez pas de nouveau mot de passe.
        </p>
        <form action="{{route('recuperation')}}" method="post">
            @csrf
            <label for="email">Rentrez votre adresse e-mail ici :</label>
            <input type="email" name="email" id="email" required>
            <input type="submit" value="M'envoyer un mot de passe temporaire">
        </form>

    </div>

</body>

</html>
