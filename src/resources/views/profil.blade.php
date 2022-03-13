<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <title>Mon compte</title>
  </head>
  <body>
    <div class="flex justify-center" style="background-color: #E4D9BC;">
      <div class="max-w-2xl my-16 w-max">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
          <div class="px-4 py-5 sm:px-6">
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <div class="flex -space-x-1 overflow-hidden">
                  @if (is_null($user->photo))
                    <img class="inline-block h-13 w-13 rounded-full ring-2 ring-white" src="https://oasys.ch/wp-content/uploads/2019/03/photo-avatar-profil.png" alt="Image de profil inconnu">
                  @else
                  <img class="inline-block h-13 w-13 rounded-full ring-2 ring-white" src="{{asset($user->photo)}}" alt="Image de profil">
                  @endif
                  </div>
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-20 sm:ml-32 sm:col-span-2">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">Mon compte</h3>
              </dd> 
            </div>
          </div>
          <div class="border-t border-gray-200">
            <dl>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Nom :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->nom}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Prénom :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->prenom}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Date de naissance</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->dateNaissance}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Département :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->departement}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Ville :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->ville}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Code postale :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->codePostal}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Email :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->mail}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-m font-medium text-gray-500">Téléphone :</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->numeroTelephone}}</dd>
              </div>

            </dl>
            <div class="flex justify-center">
              <a href={{route('pageModificationCompte', ['id' => $user->id_compte])}}>
              <button  class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-yellow-300 rounded-md hover:bg-yellow-200 focus:outline-none focus:bg-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                 Modifier mon compte 
              </button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>