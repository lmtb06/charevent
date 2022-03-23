<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recuperation mot de passe</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class=" bg-orange-200 ">
    <main>
        <section>
            <!--Div de la barre navigation en haut de l'écran à ajouter-->
        </section>
        <section>
            <div id="content">
                <div class="m-1 text-4xl font-bold flex content-center justify-center">
                    <h1>Mot de passe oublié?</h1>
                </div>
                <div class="m-1 text-xl flex content-center justify-center">
                    <p>Un mot de passe temporaire vous sera envoyer par email.
                        Attention, si nous ne reconnaissons pas votre adresse e-mail, vous ne recevrez pas de nouveau
                        mot de passe.
                    </p>
                </div>
                <!-- Le gros Rectangle -->
                <div class=" text-2xl font-bold flex content-center justify-center">
                    <div class="mt-2 border-2 border-black m-4 rounded-2xl bg-gradient-to-b from-white to-white-700">

                        <form action="{{ route('recuperation') }}" method="post">
                            @csrf
                            <div>
                                <label class="m-5" for="email">Rentrez votre adresse e-mail ici :</label>
                                <input class="m-5 bg-white p-2 border-2 border-black text-ms" placeholder="Email..."
                                    class=" bg-transparent text-black" type="email" name="email" id="email" required>
                            </div>
                            <div class="flex content-center justify-center">
                                <input
                                    class=" mb-3 modal-open bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 ml-8"
                                    data-modal-toggle="authentication-modal" type="submit"
                                    value="M'envoyer un mot de passe temporaire">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>


</body>

</html>
