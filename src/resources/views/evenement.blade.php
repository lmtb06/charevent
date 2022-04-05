@extends('layout.layout')

@section('titre')
    Charevent - {{ $event->titre }}
@endsection

@section('content')
    <main class="pt-16 pb-6">
        <!-- Bloc d'evenement-->
        <section class="p-4  flex items-center justify-center">

            <!-- Le gros rectangle-->
            <div class="bg-white mt-2 border-2 border-black m-1 rounded-2xl  max-w-6xl">
                <!-- Nom/date-->
                <div class="grid gap-1 grid-cols-3 m-1 bg-gray-100">
                    <div></div>
                    <div class="px-4 flex items-center justify-center">
                        <h2 class="text-3xl font-bold ml-3  mt-3">{{ $event->titre }}</h2>
                    </div>
                    <div></div>
                </div>
                <!-- Image à mettre -->
                <div class="w-full flex justify-center mt-5">
                    <img class="" src="http://picsum.photos/id/10/600/400" alt="lac">

                </div>
                <!-- Description de l'évènement-->
                <div class="px-4 bg-gray-100 ">
                    <h2 class="text-2xl ml-3 mt-5 ">{{ $event->description }}</h2>
                </div>

                <!-- Titre Participants -->
                <div class=" sm:grid sm:grid-cols-2 sm:gap-10">
                    <div class="px-4 flex items-center justify-center">
                        <h2 class="text-2xl font-bold  mt-5 underline">Liste des participants </h2>
                    </div>
                    <div class="px-4 flex items-center justify-center">
                        <h2 class="text-2xl font-bold  mt-5 underline">Liste des besoins </h2>
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
                                    <div class="bg-gray-50 px-4 py-1 sm:grid sm:gap-10 sm:px-6 rounded-2xl">
                                        <dt class="text-sm font-medium mt-8 justify-center text-black-500 ">Il n'y a pas
                                            encore de participants...</dt>
                                    </div>
                                </div>
                            @else
                                @foreach ($event->comptes as $p)
                                    <!--2e  Fin du Petit bloc une liste a mettre en boucle-->
                                    <div class=" bg-indigo-100  m-1 border-4 border-indigo-400 rounded-2xl">
                                        <!-- Un participant-->
                                        <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-4 sm:gap-10 sm:px-6 rounded-2xl">
                                            <div class="mt-1 mb-1">
                                                <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg"
                                                    class="w-20 h-auto rounded-full" alt="">
                                            </div>
                                            <dt class="text-sm font-medium mt-8 justify-center text-black-500 ">
                                                {{ $p->nom }}</dt>
                                            <dt class="text-sm font-medium mt-8 justify-center text-black-500">
                                                {{ $p->prenom }}</dt>
                                            <dt class="text-sm font-medium mt-8 justify-center text-black-500">
                                                {{ $p->ville }}</dt>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="overflow-y-auto h-64 ml-2 mr-2">

                            @if (count($event->besoins) < 1)
                                <div class=" bg-indigo-100  m-1 border-4 border-indigo-400 rounded-2xl">
                                    <!-- Un Besoin-->
                                    <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-2 sm:gap-10 sm:px-6 rounded-2xl">
                                        <div class="mt-1 mb-1">
                                            <dt class="text-sm font-medium mt-3 justify-center text-black-500 ">Il n'y a pas
                                                encore de besoins...</dt>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach ($event->besoins as $b)
                                    <div class=" bg-indigo-100  m-1 border-4 border-indigo-400 rounded-2xl">
                                        <!-- Un Besoin-->
                                        <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-2 sm:gap-10 sm:px-6 rounded-2xl">
                                            <div class="mt-1 mb-1">
                                                <dt class="text-sm font-medium mt-3 justify-center text-black-500 ">
                                                    {{ $b->titre }}</dt>

                                            </div>
                                            <div class=" justify-end flex">
                                                <button
                                                    class="modal-open2 ml-44 my-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"
                                                    type="button" data-modal-toggle="authentication-modal2">
                                                    Modifier
                                                </button>
                                                <!-- BOITE MODAL POUR MODIFIER UN BESOIN -->


                                                <div
                                                    class="modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                                    <div
                                                        class="modal-overlay2 absolute w-full h-full bg-gray-900 opacity-50">
                                                    </div>
                                                    <div
                                                        class="modal-container2 bg-white w-11/12 md:max-w-lg  mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                                        <!-- Add margin if you want to see some of the overlay behind the modal-->
                                                        <div class="modal-content2 py-4 text-left px-6">
                                                            <!--Title-->
                                                            <div class="flex justify-between items-center pb-3">
                                                                <p class="text-2xl font-bold">Modifer un besoin</p>
                                                                <div class="modal-close2 cursor-pointer z-50">
                                                                    X
                                                                </div>
                                                            </div>
                                                            <!--Body-->
                                                            <br>
                                                            <form
                                                                action="{{ route('modifierBesoin', ['id' => $b->id_besoin]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <p>Intitulé :<input
                                                                        class="ml-14 shadow appearance-none border rounded w-2/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                                                        id="intitule" name="intitule" value="{{$b->titre}}"></p>
                                                                <br>

                                                                <div class="flex justify-between pt-2">
                                                                    <button
                                                                        class="modal-close2 px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Annuler</button>

                                                                    <input type="submit" value="Confirmer"
                                                                        class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2 border">

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                            <!-- FIN BOITE MODAL POUR MODIFIER UN BESOIN -->

                                        </div>
                                    </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2 sm:gap-10 sm:px-6">


                    <div class="mt-2 flex items-center justify-center">
                        <!-- Administration de l'événement -->

                        @if ($event->id_createur == Auth::id())
                            <a href="{{ route('pageFromRechercheParticipants', ['id' => $event->id_evenement]) }}">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">
                                    Inviter des personnes
                                </button>
                            </a>
                        @else
                            <form method="POST" action="{{ route('postule', ['id' => $event->id_evenement]) }}">
                                @csrf
                                @if ($participeDeja)
                                    <input type="submit"
                                        formaction="{{ route('quitter', ['id' => $event->id_evenement]) }}"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded my-2 "
                                        value="Quitter l'événement" />
                                @else
                                    <!-- Si une demande ou une invitation est déjà en cours,
                                                bouton désactivé -->
                                    @if ($demande > 0)
                                        <input type="submit"
                                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded my-2"
                                            value="En attente..." disabled />
                                    @else
                                        <input type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"
                                            value="Postuler" />
                                    @endif
                                @endif
                        @endif
                        </form>
                    </div>

                    <div class="mt-2 flex items-center justify-center">
                        <!-- DEBUT Boite modale -->
                        <button
                            class="modal-open bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"
                            type="button" data-modal-toggle="authentication-modal">
                            Ajouter un besoin
                        </button>

                        <!-- version PC !-->
                    </div>
                </div>

                <!--Modal-->
                <div
                    class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                    <div
                        class="modal-container bg-white w-11/12 md:max-w-lg  mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <!-- Add margin if you want to see some of the overlay behind the modal-->
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Ajouter un besoin</p>
                                <div class="modal-close cursor-pointer z-50">
                                    X
                                </div>
                            </div>
                            <!--Body-->
                            <br>
                            <form action="{{ route('creerBesoin', ['id' => $event->id_evenement]) }}" method="POST">
                                @csrf
                                <p>Intitulé :<input
                                        class="ml-14 shadow appearance-none border rounded w-2/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                        id="confirmation_mot_de_passe_suppression" name="intitule"></p>
                                <br>

                                <div class="flex justify-between pt-2">
                                    <button
                                        class="modal-close ml-44 my-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">Annuler</button>

                                    <input type="submit" value="Confirmer"
                                        class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2 border">

                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- FIN boite modale -->
            </div>
            <div class="grid gap-1 grid-cols-3 mt-2 ml-5 bg-gray-100 mr-4">
                <div class=" flex items-center justify-center">
                    <h2 class="text-2xl ">Début :
                        {{ \Carbon\Carbon::parse($event->dateDebut)->format('d/m/Y') }}</h2>
                </div>
                <div class=" flex items-center justify-center">
                    <!-- Administration de l'événement -->
                    @if ($event->id_createur == Auth::id())
                        <a href="{{ route('pageModificationEvenement', ['id' => $event->id_evenement]) }}">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">
                                Modifier l'événement
                            </button>
                        </a>
                    @endif
                </div>
                <div class=" flex items-center justify-center ">
                    <h2 class="text-2xl">Fin : {{ \Carbon\Carbon::parse($event->dateFin)->format('d/m/Y') }}
                    </h2>
                </div>
            </div>
            </div>
            </div>
            </div>
        </section>

    </main>

    <script>
        var ouvrirBoiteModale = document.querySelectorAll('.modal-open')

        for (var i = 0; i < ouvrirBoiteModale.length; i++) {
            ouvrirBoiteModale[i].addEventListener('click', function(event) {
                event.preventDefault()
                basculerBoiteModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', basculerBoiteModal)

        var fermerBoiteModale = document.querySelectorAll('.modal-close')
        for (var i = 0; i < fermerBoiteModale.length; i++) {
            fermerBoiteModale[i].addEventListener('click', basculerBoiteModal)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var quitter = false
            if ("key" in evt) {
                quitter = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                quitter = (evt.keyCode === 27)
            }
            if (quitter && document.body.classList.contains('modal-active')) {
                basculerBoiteModal()
            }
        };


        function basculerBoiteModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

        var ouvrirBoiteModale2 = document.querySelectorAll('.modal-open2')

        for (var i = 0; i < ouvrirBoiteModale2.length; i++) {
            ouvrirBoiteModale2[i].addEventListener('click', function(event) {
                event.preventDefault()
                basculerBoiteModal2()
            })
        }

        const overlay2 = document.querySelector('.modal-overlay2')
        overlay2.addEventListener('click', basculerBoiteModal2)

        var fermerBoiteModale2 = document.querySelectorAll('.modal-close2')
        for (var i = 0; i < fermerBoiteModale2.length; i++) {
            fermerBoiteModale2[i].addEventListener('click', basculerBoiteModal2)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var quitter2 = false
            if ("key" in evt) {
                quitter2 = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                quitter2 = (evt.keyCode === 27)
            }
            if (quitter2 && document.body.classList.contains('modal-active2')) {
                basculerBoiteModal2()
            }
        };


        function basculerBoiteModal2() {
            const body = document.querySelector('body')
            const modal2 = document.querySelector('.modal2')
            modal2.classList.toggle('opacity-0')
            modal2.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active2')
        }
    </script>
@endsection
