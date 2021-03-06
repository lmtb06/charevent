@extends('layout.layout')

@section('titre')
    Charevent - Inviter à l'événement {{$event->titre}}
@endsection

@section('content')
<body class="bg-orange-200 w-full">
            <!--Titre de la page-->
            <!--Bloc de recherche-->
            <section class="flex items-center justify-center" >
            <div class="mt-20 mr-4 ml-4 lg:w-2/3 mb-4">
                <!--Le gros rectangle-->
            <form method="POST" action={{route('rechercheParticipant', ['id' => $event->id_evenement])}}>
                @csrf
                <div class="mt-2 border-2 border-black m-1 rounded-2xl bg-white">
                <!--Titre de la page-->
                <div class=" flex content-center justify-center">
                    <a href="{{route('pageEvenement', ['id' => $event->id_evenement])}}">
                        <h2 class="text-2xl font-bold">Evenement "{{$event->titre}}"</h2>
                    </a>
                </div>
                    
                    <!-- Titre recherche de participants-->
                    <div class="m-1 text-xl font-bold flex content-center justify-center mb-4">
                                Recherche de participants
                    </div>
                    <!-- Les elements coupés en deux -->
                    <div class=" grid gap-1 lg:grid-cols-2">
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
                                Choisir que des participant ayant partagé leur numéro de téléphone ?
                            </label>
                            <!--Partie de droite Age maximal (champs)-->
                            <div class="mt-3 ml-1 justify-center ">
                                <input type="checkbox" name="tel" id="tel" class="justify-center  default:ring-2 " />
                            </div>
                        
                    </div>
                    <!--Bouton submit-->
                    <div class=" mt-2 flex items-center justify-center">
                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"
                                value="Lancer la recherche"
                            />
                    </div>
                </div>
                </form>
            </div>
        </div>
            </section>
    </body>
@endsection