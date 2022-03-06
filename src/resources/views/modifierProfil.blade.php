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
            <div class="bg-white px-4 py-5 mx-40">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">Modification du compte</h3>
            </div>
          </div>
          <form method='post' action='{{route('modifierCompte', ['id' => $user->id_compte])}}'>
            @csrf
          <div class="border-t border-gray-200">
            <dl>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Nom*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" 
                    id="nom" name="nom" value="{{$user->nom}}" type="text">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Prénom*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black" 
                    id="prenom" name="prenom" value="{{$user->prenom}}" type="text">
                </dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Date de naissance*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                id="date_de_naissance" name="dateNaissance" value="{{$user->dateNaissance}}" type="date">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Département*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="departement" name="departement" value="{{$lieu->departement}}" type="number">
                </dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Ville*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="ville" name="ville" value="{{$lieu->ville}}" type="text">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Code postale*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="code_postale" name="codePostal" value="{{$lieu->codePostal}}" type="number">
                </dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="email" name="mail" value="{{$user->mail}}" type="email">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Mot de passe*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="hashMDP" name="hashMDP" type="password">
                </dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Confirmation*</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="hashMDP_confirmation" name="hashMDP_confirmation" type="password">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                    id="telephone" name="numeroTelephone" value="{{$user->numeroTelephone}}" type="numeric">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Notification par mail</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input class="form-check-input appearance-none h-4 w-4 border border-black rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                    type="checkbox" name="notificationMail" id="notification_email" @checked($user->notificationMail)>
                </dd>
              </div>

            </dl>
            <div class="flex justify-center">
              <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 mr-8"
                value="Valider modification"
              />
              <input type="submit" formaction="{{route('effacerCompte', ['id' => $user->id_compte])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 ml-8"
                value="Supprimer mon compte"
              />
            </div>
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
          </form>
        </div>
      </div>
    </div>
  </body>
</html>