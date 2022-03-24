@extends('layout.layout')

@section('titre')
    Charevent - {{$event->titre}}
@endsection

@section('content')
    <body class="">
        <main>
            
            
            <!-- Bloc d'evenement-->
            <section  class="p-4  flex items-center justify-center">
                

                <!-- Le gros rectangle-->
                <div class="bg-white mt-2 border-2 border-black m-1 rounded-2xl  max-w-6xl">
                    <!-- Nom/date-->
                    <div class="grid gap-1 grid-cols-3 m-1 bg-gray-100">
                        <div ></div>
                        <div class="px-4 flex items-center justify-center">
                            <h2 class="text-3xl font-bold ml-3  mt-3">{{$event->titre}}</h2>
                        </div>
                        <div ></div>
                    </div>
                    <!-- Image à mettre -->
                    <div class="w-full flex justify-center mt-5">
                        <img class="" src="http://picsum.photos/id/10/600/400" alt="lac">

                    </div>
                    <!-- Description de l'évènement-->
                    <div class="px-4 bg-gray-100 ">
                        <h2 class="text-2xl ml-3 mt-5 ">{{$event->description}}</h2>
                    </div>
                    
                    <!-- Titre Participants -->
                    <div class=" sm:grid sm:grid-cols-2 sm:gap-10">
                        <div class="px-4 flex items-center justify-center">
                            <h2 class="text-2xl font-bold  mt-5 underline">Liste des participant </h2>
                        </div>
                        <div class="px-4 flex items-center justify-center">
                                            <h2 class="text-2xl font-bold  mt-5 underline">Liste des Besoins : </h2>
                        </div>
                    </div>
                        
                    <!-- Bloc Listes des participants-->
                    <div class="bg-white mt-5 ml-drop-shadow-2xl  m-1 border-5 border-indigo-800 rounded-2xl ">
                       
                        <!-- Liste Participants -->
                        

                       
                                <div class="grid px-1 grid-cols-2 ">


                                    <div class="overflow-y-auto h-64 ml-2 mr-2">
                                        <!--Petit bloc une liste a mettre en boucle-->

                                        @if (count($event->comptes) < 1)
                                        <div class=" bg-indigo-100 m-1 border-4 border-indigo-400 rounded-2xl">
                                            <!-- Un particiapant-->
                                            <div class="bg-gray-50 px-4 py-1 sm:grid sm:gap-10 sm:px-6">
                                                <dt class="text-sm font-medium mt-8 justify-center text-black-500 ">Il n'y a pas encore de participants...</dt>
                                            </div>
                                        </div>
                                        
                                        @else
                                        @foreach ($event->comptes as $p)

                                        <!--2e  Fin du Petit bloc une liste a mettre en boucle-->
                                        <div class=" bg-indigo-100  m-1 border-4 border-indigo-400 rounded-2xl">
                                            <!-- Un particiapant-->
                                            <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-4 sm:gap-10 sm:px-6">
                                                <div class="mt-1 mb-1">
                                                <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="w-20 h-auto rounded-full" alt="">
                                                </div>
                                                <dt class="text-sm font-medium mt-8 justify-center text-black-500 ">{{$p->nom}}</dt>
                                                <dt class="text-sm font-medium mt-8 justify-center text-black-500">{{$p->prenom}}</dt>
                                                <dt class="text-sm font-medium mt-8 justify-center text-black-500">{{$p->ville}}</dt>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="overflow-y-auto h-64 ml-2 mr-2">
                                        
                                    @if (count($event->besoins) < 1)
                                        <div class=" bg-indigo-100  m-1 border-4 border-indigo-400 rounded-2xl">
                                            <!-- Un Besoin-->
                                            <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-2 sm:gap-10 sm:px-6">
                                                <div class="mt-1 mb-1">
                                                    <dt class="text-sm font-medium mt-3 justify-center text-black-500 ">Il n'y a pas encore de besoins...</dt>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @foreach ($event->besoins as $b)
                                        <div class=" bg-indigo-100  m-1 border-4 border-indigo-400 rounded-2xl">
                                            <!-- Un Besoin-->
                                            <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-2 sm:gap-10 sm:px-6">
                                                <div class="mt-1 mb-1">
                                                    <dt class="text-sm font-medium mt-3 justify-center text-black-500 ">{{$b->titre}}</dt>
                                                    
                                                </div>
                                                <div class=" justify-end flex">
                                                <button class="underline  text-black font-bold py-2 px-4 my-2 ml-8" type="button" >Modifier</button>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif

                                    </div>
                            </div>
                            <div class="sm:grid sm:grid-cols-2 sm:gap-10 sm:px-6">


                                <div class="mt-2 flex items-center justify-center">
                                    @if ($event->id_createur == Auth::id())
                                        <a href="{{route('pageFromRechercheParticipants', ['id' => $event->id_evenement])}}">

                                            <button type="submit" class="modal-open bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded my-2 ">
                                            Inviter des personnes
                                            </button>
                                        </a>
                                    @else
                                    <form method="POST" action="{{route('postule', ['id' =>  $event->id_evenement])}}">
                                        @csrf
                                        <input type="submit" class="modal-open bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded my-2 "
                                            value="Postuler"
                                            @if (!is_null($demande))
                                                @if (!isset($demande->accepte) && !isset($demande->dateChoix))
                                                    hidden disabled
                                                @endif
                                            @endif
                                        />
                                    @endif
                                </div>
                                
                                <div class="mt-2 flex items-center justify-center" >
                                        <button class="modal-open bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded my-2" type="button" >Ajouter un besoin</button>
                                </div>
                            </div>
                            <div class="grid gap-1 grid-cols-3 mt-2 ml-5 bg-gray-100">
                                <div class=" flex items-center justify-center">
                                    <h2 class="text-2xl ">Début : {{$event->dateDebut}}</h2>
                                </div>
                                <div ></div>
                                <div class=" flex items-center justify-center">
                                    <h2 class="text-2xl">Fin : {{$event->dateFin}}</h2>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

            </section>
            
        </main>

    </body>
@endsection