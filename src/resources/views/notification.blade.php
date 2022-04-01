@extends('layout.layout')

@section('titre')
    Charevent - Notifications
@endsection

@section('content')
  <main>
  <div class="h-full">
  <div class="flex justify-center h-full">
    <div class="max-w-8xl my-16">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
        
        <form method="POST" action="#">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-2xl text-center font-medium text-gray-900 w-full my-6">Notifications</h3>
          </div>

          <div class="bg-white-50 px-4 sm:grid sm:grid-cols-1 sm:gap-10 sm:px-6">
            <div class="flex justify-end">
              <input type="submit" value="Supprimer" class="bg-red-500 mt-6 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-2" Supprimer />
            </div>
          </div>

          <div class="border-t border-gray-200">
            <dl>

              @foreach ($notifs as $n)
                @if ($n->dateLecture == null)
                  <div class="bg-orange-0 px-2 py-1 sm:px-6 sm:gap-10">
                @else
                  <div class="bg-orange-50 px-2 py-1 sm:px-6 sm:gap-10">
                @endif
                    <div class="sm:grid sm:grid-cols-2">
                      <div class="sm:grid sm:grid-cols-2">
                        <div>
                        <div class="text-sm font-medium text-gray-500"><b>Reçu le: </b>{{ \Carbon\Carbon::parse($n->dateReception)->format('d/m/Y')}}</div>
                        <div class="text-sm font-medium text-gray-500"> <b>Evenement :</b> {{$n->evenement->titre}}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-500">{{$n->message}}</div>
                      </div>
                      <div class="sm:grid sm:grid-cols-2">
                        <div class="flex justify-end items-center">
                          <input class="form-check-input form-check-input mr-5 appearance-none h-8 w-8 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer" type="checkbox" name="inlineBoxOptions" id="inlineBox" value="">
                        </div>
                        <div class="flex justify-end">
                          <button type="submit"  class="bg-blue-500 mt-2 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded my-2">Plus d'infos</button>
                        </div>
                      </div>
                    </div>
                  </div>
              @endforeach

              </dl>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
