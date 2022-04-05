@extends('layout.layout')

@section('titre')
    Charevent - {{$event->titre}} - Recherche participants
@endsection

@section('content')
  <div class="flex justify-center h-full">
    <div class="max-w-4xl my-16 w-full pt-8">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
        <form method="POST" action={{route('invitation', ['id' => $event->id_evenement])}}>
          @csrf
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-2xl text-center font-medium text-gray-900 w-full my-6">Résultats de la recherche</h3>
          </div>

          <div class="bg-white-50 px-4 sm:grid sm:grid-cols-6 sm:gap-10 sm:px-6">
            <dt class="text-m font-medium mt-4 font-semibold justify-center text-black">Profil</dt>
            <dt class="text-m font-medium mt-4 font-semibold justify-center text-black">Nom</dt>
            <dt class="text-m font-medium mt-4 font-semibold justify-center text-black">Prénom</dt>
            <dt class="text-m font-medium mt-4 font-semibold justify-center text-black">Ville</dt>
            <dt class="text-m font-medium mt-4 font-semibold justify-center text-black">Age</dt>
            <input type="submit" value="Ajouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"/>

          </div>

          <div class="border-t border-gray-200">

            @if (count($participants) < 1 )
            <div class="text-sm font-medium mt-8 justify-center text-gray-500">
              <p>Nous n'avons pas trouvé d'utilisateurs correspondant à vos critères. Il est possible que des utilisateurs correspondant aux critères :
                <ul>
                  <li> - ont déjà été invité à cet événement. </li>
                  <li> - participent déjà à cet événement. </li>
                  <li> - attendent une réponse quant à leur candidature pour rejoindre cet événement.</li>
                </ul>
              </p>
            </div>


            @else
            
                @foreach ($participants as $p)
                  @if ($p->id_compte != $event->id_createur)
                    <dl>
                      <div class="bg-gray-50 px-4 py-1 sm:grid sm:grid-cols-6 sm:gap-10 sm:px-6">
                        <div class="mt-1 mb-1">
                          <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="w-20 h-auto rounded-full" alt="">
                        </div>
                        <dt class="text-sm font-medium mt-8 justify-center text-gray-500">{{$p->nom}}</dt>
                        <dt class="text-sm font-medium mt-8 justify-center text-gray-500">{{$p->prenom}}</dt>
                        <dt class="text-sm font-medium mt-8 justify-center text-gray-500">{{$p->localisation->ville}}</dt>
                        <dt class="text-sm font-medium mt-8 justify-center text-gray-500">{{ \Carbon\Carbon::parse($p->dateNaissance)->age}}</dt>
                        <div class="flex-1 justify-center">
                        <input class="form-check-input form-check-input appearance-none h-8 w-8 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-7 ml-9 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="checkbox" name="participant[]" id="inlineBox" value={{$p->id_compte}}>
                        </div>
                      </div>
                    </dl>
                  @endif
                @endforeach
            @endif
            
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection