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
            <!--Div de la barre navigation en haut de l'écran à ajouter
            
            
            -->
            </section>
            <!--Titre de la page-->
            <section class=" p-4 flex content-center justify-center">
                <div class="px-4 ">
                    <a href="{{route('pageEvenement', ['id' => $event->id_evenement])}}">
                        <h2 class="text-2xl font-bold">Evenement "{{$event->titre}}"</h2>
                    </a>
                </div>
            </section>
            <!--Bloc de recherche-->
            <section class="p-4 flex items-center justify-center" >
                <!--Le gros rectangle-->
            <form method="POST" action={{route('rechercheParticipant', ['id' => $event->id_evenement])}}>
                @csrf
                <div class="mt-2 border-2 border-black m-1 rounded-2xl bg-gradient-to-b from-white to-white-700">
                    <!-- Titre recherche de participants-->
                    <div class="m-1 text-xl font-bold flex content-center justify-center mb-4">
                                Recherche de participants
                    </div>
                    <!-- Les elements coupés en deux -->
                    <div class=" grid gap-1 grid-cols-2">
                        <!--Partie de gauche Departement (texte)-->
                            <label for="name" class="m-1 font-bold flex content-center justify-center mt-3">
                                Prénom ou nom de famille :
                            </label>
                            <!--Partie de droite Departement (champs)-->
                            <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                                <input type="text" id="name" name="name" placeholder="Prénom ou nom..." class=" bg-transparent text-black">
                            </div>
                            <label for="departement" class="m-1 font-bold flex content-center justify-center mt-3">
                                    Département :
                            </label>
                            <!--Partie de droite Departement (champs)-->
                            <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                                <input type="number" id="departement" name="departement" placeholder="Département..." class=" bg-transparent text-black">
                            </div>
                            <!--Partie de gauche Ville (texte)-->
                            <label for="ville" class="m-1 font-bold flex content-center justify-center mt-3">
                                Ville :
                            </label>
                            <!--Partie de droite Ville (champs)-->
                            <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                                <input type="text" id="ville" name="ville" placeholder="Ville..." class=" bg-transparent text-black">
                            </div>
                            <!--Partie de gauche Age minimal (texte)-->
                            <label for="age_min" class="m-1 font-bold flex content-center justify-center mt-3">
                                Age minimum : 
                            </label>
                            <!--Partie de droite Age minimal (champs)-->
                            <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5 ">
                                <input type="number" id="age_min" name="age_min" placeholder="Age minimum..." class=" bg-transparent text-black">
                            </div>
                            <!--Partie de gauche Age maximal (texte)-->
                            <label for="age_max" class="m-1 font-bold flex content-center justify-center mt-3">
                                Age maximum : 
                            </label>
                            <!--Partie de droite Age maximal (champs)-->
                            <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                                <input type="number" name="age_max" id="age_max" placeholder="Age maximum..." class=" bg-transparent text-black">
                            </div>

                            <!--Partie de gauche numero de telephone requis (texte)-->
                            <label for="tel" class="m-1 font-bold flex content-center justify-center mt-3">
                                Un telephone ? 
                            </label>
                            <!--Partie de droite Age maximal (champs)-->
                            <div class="mt-3 ml-1 ">
                                <input type="checkbox" name="tel" id="tel" class="default:ring-2 " />
                            </div>
                        
                    </div>
                    <!--Bouton submit-->
                    <div class=" mt-2 flex items-center justify-center">
                            <input type="submit" class="text-ms rounded-2xl border-2 border-orange-800 bg-gradient-to-b from-orange-400 to-orange-100 m-2 p-2 "
                                value="Lancer la recherche"
                            />
                    </div>
                </div>
                </form>
            </section>
        </main>
    </body>
</html>