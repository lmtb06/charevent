@extends('layout.layout')

@section('titre')
Charevent - Accueil
@endsection

@section('content')
    <body class=" bg-orange-200 ">
        <main>
            <section class=" p-4 flex content-center justify-center">
                <div class="px-4 ">
                    <h2 class="text-2xl font-bold">Les évènements de l'association</h2>
                </div>
            </section>
            <!--Barre de recherche-->
            <section class="p-4 flex items-center justify-center">
            <div class="  bg-orange-200 flex items-start">
                <div class="bg-orange-200  text-gray-300">
                    <div class="relative bg-white p-2 rounded-3xl border-2 border-orange-800">
                        <svg class="h-6 w-5 absolute left-0 ml-2" fill="black" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd">
                            </path>
                        </svg>
                        <input type="text" placeholder="Search..." class="ml-6 bg-transparent text-black">

                    </div>
                </div>
                <div class="bg-orange-200 flex items-center justify-center text-gray-300">
                    <div class="relative p-2 ">
                            <svg  class="h-7 w-8 absolute left-0 pointer-events-none" fill="white" viewBox="0 0 24 24" stroke="black" strokeWidth={2}>
                                <path strokeLinecap="round" strokeLinejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg></a>
                    </div>
                </div>
            </div>
            </section>
            <!--Barre de recherche FIN-->
            <section class="p-4 flex items-center justify-center" >
                <!--Gros rectangle-->
                <div class=" border-2 rounded-3xl border-orange-800 grid gap-1 grid-cols-2">
                    @if (count($events)>0)
                    @foreach ($events as $event)
                    <!--Petit Rectangle-->
                    <div class=" drop-shadow-2xl bg-gradient-to-b from-white to-white-500 m-1 border-2 border-black rounded-2xl">
                        <!-- Trier le petit rectangle en 3 parties-->
                        <div class="grid px-1 grid-cols-3">
                            <!-- 1ere partie - l'image-->
                            <div class="m-1">
                                <img class="" src="http://picsum.photos/id/10/200/100" alt="lac">
                            </div>
                            <!-- 2e partie - Nom+Description-->
                            <div class="ml-2 grid-line-2 grid-rows-2">
                                <!-- Nom-->
                                <div class="mt-1 text-xs font-bold">
                                        {{$event->titre}}
                                </div>
                                <!--Description-->
                                <div class="mt-2 text-xs">
                                        {{$event->description}}
                                </div>
                            </div>
                            <!-- 3e partie - Date+Bouton-->
                            <div class="  grid grid-cols-2 grid-rows-2 flex items-center justify-center">
                                <!-- Date de debut-->
                                <div class=" m-1  text-xs flex items-center justify-center">
                                        {{$event->dateDebut}}
                                </div>
                                <!-- Date de Fin-->
                                <div class="  m-1  text-xs flex items-center justify-center">
                                    {{$event->dateFin}}

                                </div>
                                <!-- Bouton Rejoindre/Quitter-->
                                @if ($user->id_compte != $event->id_createur)
                                    <div class=" m-1 text-xs flex items-center justify-center">
                                        <button class="p-1 bg-green-200 border-2 rounded-3xl border-green-800" type="submit">Rejoindre</button>
                                    </div>
                                @endif
                                <!-- Bouton consulter-->
                                <div>
                                    <a href="{{route('pageEvenement', ['id' => $event->id_evenement])}}">
                                    <div class=" m-1  text-xs flex items-center justify-center">
                                            <button class="p-1 bg-white border-2  rounded-3xl border-black" type="submit">Consulter</button>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Petit Rectangle FIN-->

                    @endforeach
                    @else
                    <div class=" m-1  text-xs flex items-center justify-center">
                        <p class="p-1 bg-white border-2  rounded-3xl border-black ">
                            Il n'y a aucun événements disponibles pour le moment.
                        </p>
                    </div>
                    @endif
                </div>
            </section>
        </main>
    </body>
@endsection