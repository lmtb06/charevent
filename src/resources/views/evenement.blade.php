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
            <!-- Bandeau en haut a ajouter-->
            <section>

            </section>
            
            <!-- Bloc d'evenement-->
            <section  class="p-4 flex items-center justify-center ">
                

                <!-- Le gros rectangle-->
                <div class=" mt-2 border-2 border-black m-1 rounded-2xl bg-gradient-to-b from-white to-white-700 max-w-6xl ">
                    <!-- Nom/date-->
                    <div class="grid gap-1 grid-cols-3 mt-2 ml-5">
                        <div class="px-4 flex items-center justify-center">
                            <h2 class="text-2xl font-bold ml-3  mt-3">Début : {{$event->dateDebut}}</h2>
                        </div>
                        <div class="px-4 flex items-center justify-center">
                            <h2 class="text-2xl font-bold ml-3  mt-3">{{$event->titre}}</h2>
                        </div>
                        <div class="px-4 flex items-center justify-center">
                            <h2 class="text-2xl font-bold ml-3  mt-3">Fin : {{$event->dateFin}}</h2>
                        </div>
                    </div>
                    <!-- Image à mettre -->
                    <div class="m-1 px-4 mt-5 flex items-center justify-center">
                        <img class="" src="http://picsum.photos/id/10/500/400" alt="lac">

                    </div>
                    <!-- Description de l'évènement-->
                    <div class="px-4 ">
                        <h2 class="text-2xl ml-3 mt-5 ">{{$event->description}}</h2>
                    </div>
                    <!-- Titre besoin -->
                    <div class="px-4">
                        <h2 class="text-2xl font-bold ml-3 mt-5 ">Besoin :</h2>
                    </div>
                    <!-- Bloc Liste Besoin-->
                    <div class="mt-5 ml-drop-shadow-2xl bg-gradient-to-b from-white to-white-500 m-1 border-2 border-black rounded-2xl">
                       
                       <!-- Liste Besoin -->
                       <div class="grid px-1 grid-cols-2">
                            <!--Petit bloc une liste a mettre en boucle-->
                            <div class=" bg-gradient-to-b from-white to-white-500 m-1 border-2 border-black rounded-2xl">
                                <!-- Un besoin -->
                                <div class="m-1">
                                    <h2 class="ml-5">Nom besoin</h2>
                                </div>
                            </div>
                            <!-- Fin du Petit bloc une liste a mettre en boucle-->

                            <!--2e Petit bloc une liste a mettre en boucle-->
                            <div class=" bg-gradient-to-b from-white to-white-500 m-1 border-2 border-black rounded-2xl">
                                <!-- Un besoin -->
                                <div class="m-1">
                                    <h2 class="ml-5">Nom besoin</h2>
                                </div>
                            </div>
                            <!--2e  Fin du Petit bloc une liste a mettre en boucle-->
                            
                        </div>
                        <div class="mt-2 flex items-center justify-center" >
                            <button type="submit" class="text-ms rounded-2xl border-2 border-orange-800 bg-gradient-to-b from-orange-400 to-orange-100 m-2 p-2 ">
                                    Ajouter un besoin
                            </button>
        
                        </div>
                    </div>
                    <!-- Titre Participants -->
                    <div class="px-4">
                        <h2 class="text-2xl font-bold ml-3 mt-5 ">Liste des participant :</h2>
                    </div>
                    <!-- Bloc Listes des participants-->
                    <div class="mt-5 ml-drop-shadow-2xl bg-gradient-to-b from-white to-white-500 m-1 border-2 border-black rounded-2xl">
                       
                        <!-- Liste Participants -->
                        <div class="grid px-1 grid-cols-2">
                            @if (is_null($event->comptes))
                                Pas encore de participants
                            @else
                            @foreach ($event->comptes as $p)
                             <!--Petit bloc une liste a mettre en boucle-->
                             <div class=" bg-gradient-to-b from-white to-white-500 m-1 border-2 border-black rounded-2xl">
                                 <!-- Un participant -->
                                 <a href="{{route('pageProfil', ['id' => $p->id_compte])}}">
                                 <div class="m-1 grid px-1 grid-cols-2">
                                    <div>
                                        <h2 class="ml-5">{{$p->prenom}} {{$p->nom}}</h2>
                                    </div>
                                    <div>
                                        <h2 class="ml-5 flex items-center justify-center">{{$p->codePostal}}</h2>
                                    </div>                                     
                                 </div>
                                </a>
                             </div>
                            @endforeach     
                            @endif                        
                         </div>
                         
                     </div>
                </div>

            </section>

            <section class="mt-2 flex items-center justify-center" >
                <!-- Bouton Inviter à l'évènement -->
                <div>
                    <a href="">
                    <button type="submit"
                     class="text-ms rounded-2xl border-2 border-orange-800 bg-gradient-to-b from-orange-400 to-orange-100 m-2 p-2 ">
                            Inviter des participants
                    </button>
                    </a>

                </div>
            </section>
            
            
        </main>

    </body>
</html>