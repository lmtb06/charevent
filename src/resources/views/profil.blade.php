@extends('layout.layout')

@section('titre')
    Charevent - Profil {{$user->prenom}} {{$user->nom}}
@endsection

@section('content')
<body>
  <div class="flex justify-center lg:bg-blue-300">
    <div class="max-w-2xl mt-16 w-max">
      <div class="bg-white lg:shadow lg:border-x-2 lg:border-black lg:shadow-4xl shadow-[#4f4c796e] overflow-hidden w-full ">
        <div class="px-4 py-5 sm:px-6">
          <div class="bg-white px-14 lg:px-4 lg:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class=" font-medium text-gray-500">
              <div class="flex mb-8 lg:mb-0 -space-x-1 overflow-hidden">
                @if (is_null($user->photo))
                <img class="inline-block rounded-full ring-2 ring-white" src="https://oasys.ch/wp-content/uploads/2019/03/photo-avatar-profil.png" alt="Image de profil inconnu">
                @else
                <img class="inline-block rounded-full ring-2 ring-white" src="{{asset('/storage/' .$user->photo)}}" alt="Image de profil">
                @endif
              </div>
            </dt>
            <div class="mt-1 text-gray-900 text-center lg:mt-20 lg:ml-20">
              <span class="self-center -z-0 before:-my-2 whitespace-nowrap text-center before:bg-blue-400 before:block before:absolute before:-inset-1 before:-skew-y-2 relative inline-block">
                <span class="relative -z-0 mb-10 ml-1 mr-1 text-center text-4xl font-semibold group  text-white"> MON COMPTE </span>
              </span>
            </div>
          </div>
        </div>
        <div class="border-t border-gray-200">
          <dl>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="font-medium text-gray-500">Nom</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$user->nom}}</dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class=" font-medium text-gray-500">Prénom :</dt>
              <dd class="mt-1  text-gray-900 sm:mt-0 sm:col-span-2">{{$user->prenom}}</dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class=" font-medium text-gray-500">Date de naissance :</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{\Carbon\Carbon::parse($user->dateNaissance)->format('d/m/Y')}}</dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class=" font-medium text-gray-500">Département :</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->departement}}</dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="font-medium text-gray-500">Ville :</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->ville}}</dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class=" font-medium text-gray-500">Code postale</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->codePostal}}</dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="font-medium text-gray-500">Email :</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$user->mail}}</dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="font-medium text-gray-500">Téléphone :</dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$user->numeroTelephone}}</dd>
            </div>

          </dl>
          @if (Auth::id() == $user->id_compte)
          <div class="flex justify-center">
            <a href="{{route('pageModificationCompte')}}">
              <button class="bg-blue-500 mb-8 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">
                Modifier mon compte
              </button>
            </a>
          </div>
          <div class="flex justify-center">
            <a href="{{route('pageModificationCompte')}}">
              <button class="mt-4 mb-8 modal-open bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 ml-8" type="button" data-modal-toggle="authentication-modal">
                Modifier mon mot de passe</button>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
              <!--Modal-->
              <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                <div class="modal-container bg-white w-11/12 md:max-w-lg  mx-auto rounded shadow-lg z-50 overflow-y-auto">
                  <!-- Add margin if you want to see some of the overlay behind the modal-->
                  <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                      <p class="text-2xl font-bold">Supprimer mon compte</p>
                      <div class="modal-close cursor-pointer z-50">
                        X
                      </div>
                    </div>
                    <!--Body-->
                    <p>Veuillez entrez votre nouveau mot de passe.</p>
                    <form id="password">
                    <p>Nouveau mot de passe :</p>
                    <p><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="mdp" name="mdp" type="password"></p>
                    <p>Confirmation :</p>
                    <p><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="mdp_confirmation" name="mdp_confirmation" type="password">
                    </p>
                    <div class="flex justify-between pt-2">
                      <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Annuler</button>
                      <button formaction="" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2 border">Confirmer</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
    
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
              </script>
              <!-- FIN boite modale -->
  </div>
</body>

@endsection