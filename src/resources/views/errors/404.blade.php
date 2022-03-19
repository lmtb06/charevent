<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"content="ie=edge">
        <title>Accueil</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class=" bg-orange-200 ">
        <main>

            <section>
                <div>
                    <h1 class="font-bold flex items-center justify-center mt-5">
                        ERREUR 404 - Page en construction...
                    </h1>
                </div>
                <a href="{{route('accueil')}}">
                <div class="flex items-center justify-center ">
                    <button type="submit" class="border-black rounded-2xl border-2 p-2 mt-5 bg-gradient-to-b from-white to-white-500 " > REVENIR PAGE PRINCIPALE</button>
                </div>
                </a>
            </section>
        </main>
    </body>
    </html>
