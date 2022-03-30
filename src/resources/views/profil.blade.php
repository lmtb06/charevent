@extends('layout.layout')

@section('titre')
    Charevent - Profil {{$user->prenom}} {{$user->nom}}
@endsection

@section('content')
<body>
  <div class="flex justify-center lg:bg-blue-300">
    <div class="max-w-2xl mt-16 w-max">
      <div class="bg-white lg:shadow-4xl shadow-[#4f4c796e] overflow-hidden w-full ">
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
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$user->dateNaissance}}</dd>
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
            <a href="{{route('pageModificationCompte', ['id' => $user->id_compte])}}">
              <button class="bg-blue-500 mb-8 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">
                Modifier mon compte
              </button>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</body>

@endsection