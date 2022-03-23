<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Mon compte</title>
</head>

<body>
  <div class="flex justify-center" style="background-color: #E4D9BC;">
    <form method='post' action="{{route('modifierCompte', ['id' => $user->id_compte])}}" enctype="multipart/form-data" class="max-w-2xl my-16 w-max">
      @csrf
      <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
        <div class="px-4 py-5 sm:px-6">
          <div class="bg-white px-4 py-5 mx-40">
            <h3 class="text-2xl leading-6 font-medium text-gray-900">Modification du compte</h3>
          </div>
        </div>
        <div class="border-t border-gray-200">

          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Nom*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$user->nom}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="nom" name="nom" type="text">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Prénom*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$user->prenom}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="prenom" name="prenom" type="text">
            </dd>
          </div>

          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Date de naissance*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$user->dateNaissance}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="date_de_naissance" name="dateNaissance" type="date">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Département*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$lieu->departement}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="departement" name="departement" type="number">
            </dd>
          </div>

          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Ville*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$lieu->ville}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="ville" name="ville" type="text">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Code postale*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$lieu->codePostal}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="code_postale" name="codePostal" type="number">
            </dd>
          </div>

          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Email*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$user->mail}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="email" name="mail" type="email">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Ancien mot de passe*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="hashMDP" name="hashMDP" type="password">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Nouveau mot de passe*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="mdp" name="mdp" type="password">
            </dd>
          </div>

          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Confirmation*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="mdp_confirmation" name="mdp_confirmation" type="password">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input value="{{$user->numeroTelephone}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="telephone" name="numeroTelephone" type="numeric">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Notification par mail</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="form-check-input appearance-none h-4 w-4 border border-black rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="notificationMail" id="notification_email" @checked($user->notificationMail)>
            </dd>
          </div>

          <div class="flex justify-center">
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 mr-8" value="Valider modification" />

            <!-- DEBUT Boite modale -->
            <button class="modal-open bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 ml-8" type="button" data-modal-toggle="authentication-modal">Supprimer mon compte</button>
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
                  <p>Veuillez entrer votre mot de passe pour confirmer la suprresion de votre compte.</p>
                  <p>Mot de passe :</p>
                  <p><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" id="confirmation_mot_de_passe_suppression" name="password" type="password"></p>

                  <div class="flex justify-between pt-2">
                    <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Annuler</button>
                    <button formaction="{{route('effacerCompte', ['id' => $user->id_compte])}}" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2 border">Confirmer</button>
                  </div>
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
        </div>
      </div>
    </form>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</body>

</html>