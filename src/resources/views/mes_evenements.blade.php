@extends('layout.layout')

@section('titre')
Charevent - Accueil
@endsection

@section('content')

<div class="bg-blue-200">
    <div class="pt-24 text-center text-2xl font-semibold">Mes évènements</div>
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