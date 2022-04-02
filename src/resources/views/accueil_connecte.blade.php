@extends('layout.layout')

@section('titre')
Charevent - Accueil
@endsection

@section('content')

<div class="bg-orange-200">
    <div class="pt-24 text-center text-2xl font-semibold">Les évènements de l'association</div>
    <section class="p-4 flex items-center justify-center">
        <div class="  bg-orange-200 flex items-start w-1/3">
            <div class="bg-orange-200  text-gray-300 w-full">
                <div class="relative bg-white p-2 rounded-3xl border-2 border-orange-800 lg:w-11/12">
                    <svg class="h-6 w-5 absolute left-0 ml-2" fill="black" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd">
                        </path>
                    </svg>
                    <input type="text" placeholder="Search..." class="ml-6 bg-transparent  text-black">
                </div>
            </div>
            <div class="bg-orange-200 flex items-center justify-center text-gray-300 ml-2 mt-0.5">
                <div class="relative inline-block text-left">
                    <div>
                        <button onclick="filtrer()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Filtrer
                        </button>
                    </div>
                    <div id="filtre" style="display:none; " class="origin-top-right absolute right-0 mt-2 w-60 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <div class="text-gray-700 block px-4 py-2 text-sm"><input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                    Trier par date
                                </label>
                            </div>
                            <div class="text-gray-700 block px-4 py-2 text-sm"><input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                    Trier par lieu
                                </label>
                            </div>
                            <div class="text-gray-700 block px-4 py-2 text-sm"><input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                    Trier par ordre alphabétique
                                </label>
                            </div>
                            <div class="text-gray-700 block px-4 py-2 text-sm"><input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                    Ordre croissant
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="p-4 flex items-center justify-center">
        @if (count($events)>0)
        <div class="items-start grid lg:grid-cols-3 gap-3 justify-between mt-4 pt-4">
            @foreach ($events as $event)
            <!--Début petit bloc d'event -->
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                <img class="w-full" src="https://static9.depositphotos.com/1000276/1100/i/600/depositphotos_11008977-stock-photo-mountain-magic-landscape.jpg" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$event->titre}}</div>
                    <p class="text-gray-700" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; line-clamp: 2; -webkit-box-orient: vertical;">
                        {{$event->description}}
                    </p>
                </div>
                <div class="text-gray-700 px-6 pt-2 pb-2">
                    Date de début : {{$event->dateDebut}}
                </div>
                <div class="text-gray-700 px-6 pt-2 pb-2">
                    Date de fin : {{$event->dateFin}}
                </div>
                <div class="px-6 pt-4 pb-4 w-full justify-center">
                    <a href="{{route('pageEvenement',['id'=>$event->id_evenement])}}">
                <button type="submit" id="submit" value="S'inscrire" class="mr-32 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Consulter</button>
</a>    
                @if ($user->id_compte != $event->id_createur)
                    <button type="submit" id="submit" value="S'inscrire" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Rejoindre</button>
                    @else
                    <button type="submit" id="submit" value="S'inscrire" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Quitter</button>
                    @endif
                </div>
            </div>
            <!--Fin petit bloc d'event -->
            @endforeach
        </div>
        @else
        <div class="pt-24 text-center text-2xl">Il n'y a aucun événements disponibles pour le moment.</div>
        @endif
    </section>
</div>

<script>
    function filtrer() {
        var x = document.getElementById("filtre");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
@endsection