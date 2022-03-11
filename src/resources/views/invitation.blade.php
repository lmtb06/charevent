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
                    <h2 class="text-2xl font-bold">Evenement "ajout du nom de l'event"</h2>
                </div>
            </section>
            <!--Bloc de recherche-->
            <section class="p-4 flex items-center justify-center" >
                <!--Le gros rectangle-->
                <div class="mt-2 border-2 border-black m-1 rounded-2xl bg-gradient-to-b from-white to-white-700">
                    <!-- Titre recherche de participants-->
                    <div class="m-1 text-xl font-bold flex content-center justify-center mb-4">
                                Recherche de participants
                    </div>
                    <!-- Les elements coupés en deux -->
                    <div class=" grid gap-1 grid-cols-2">
                        <!--Partie de gauche Departement (texte)-->
                        <div class="m-1 font-bold flex content-center justify-center mt-3">
                                Département :
                        </div>
                        <!--Partie de droite Departement (champs)-->
                        <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                            <input type="text" placeholder="Département..." class=" bg-transparent text-black">
                        </div>
                        <!--Partie de gauche Ville (texte)-->
                        <div class="m-1 font-bold flex content-center justify-center mt-3">
                            Ville :
                        </div>
                        <!--Partie de droite Ville (champs)-->
                        <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                            <input type="text" placeholder="Ville..." class=" bg-transparent text-black">
                        </div>
                        <!--Partie de gauche Age minimal (texte)-->
                        <div class="m-1 font-bold flex content-center justify-center mt-3">
                            Age minimum : 
                        </div>
                        <!--Partie de droite Age minimal (champs)-->
                        <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5 ">
                            <input type="text" placeholder="Age minimum..." class=" bg-transparent text-black">
                        </div>
                        <!--Partie de gauche Age maximal (texte)-->
                        <div class="m-1 font-bold flex content-center justify-center mt-3">
                            Age maximum : 
                        </div>
                        <!--Partie de droite Age maximal (champs)-->
                        <div class=" bg-white p-2 border-2 border-black text-ms m-1 mr-5">
                            <input type="text" placeholder="Age maximum..." class=" bg-transparent text-black">
                        </div>

                        <!--Partie de gauche numero de telephone requis (texte)-->
                        <div class="m-1 font-bold flex content-center justify-center mt-3">
                            Un telephone ? 
                        </div>
                        <!--Partie de droite Age maximal (champs)-->
                        <div class="mt-3 ml-1 ">
                            <input type="checkbox" class="default:ring-2 " />
                        </div>

                    </div>
                    <!--Bouton submit-->
                    <div class=" mt-2 flex items-center justify-center">
                            <button type="submit" class="text-ms rounded-2xl border-2 border-orange-800 bg-gradient-to-b from-orange-400 to-orange-100 m-2 p-2 ">
                                    LANCER LA RECHERCHE
                            </button>
                    </div>




                </div>
            </section>
        </main>
    </body>
</html>