@extends('layout.layout')

@section('titre')
    Charevent - Notifications
@endsection

@section('content')
  <main>
  <div class="h-full">
  <div class="flex justify-center h-full">
    <div class="my-16 w-full lg:w-2/3">
      <div class="bg-white lg:shadow overflow-hidden sm:rounded-lg w-full ">
        
        <form method="POST" action="{{route('supprimerNotification')}}">
          @csrf
          <div class="px-4 py-5 lg:px-6">
            <h3 class="text-2xl text-center font-medium text-gray-900 w-full my-6">Notifications</h3>
          </div>

          <div class="bg-white-50 px-4 sm:grid sm:grid-cols-1 sm:gap-10 sm:px-6">
            <div class="flex justify-end">
            <!-- Apparence du bouton de suppression -->
                <input 
                  type="submit"
                  value="Supprimer"
                  class="bg-red-500 mt-6 hover:bg-red-700 disabled:bg-red-400 text-white font-bold py-2 px-4 rounded my-2"
                  Supprimer
                  @if (count($notifs) == 0)
                    disabled
                  @endif />
            </div>
          </div>

          <div class="border-t border-gray-200">
            <dl>
              <!-- Cas où l'utilisateur n'a pas encore reçu de notification -->
              @if (count($notifs) == 0)
                <div class=" px-2 py-1 sm:px-6 sm:gap-10">
                  <div class="sm:grid sm:grid-cols-2">
                    <div class="sm:grid sm:grid-cols-2">
                      <div>
                      <div class="text-sm font-medium text-gray-500"></div>
                      <div class="text-sm font-medium text-gray-500"></div>
                      </div>
                      <div class="text-l font-medium text-gray-500">Vous n'avez reçu aucune notification.</div>
                    </div>
                    <div class="sm:grid sm:grid-cols-1">
                      <div class="flex justify-end sm:gap-10 items-center">
                        <div></div>
                        <div></div>
                        <div></div>
                      </div>
                    </div>
                  </div>
                </div>
              @else

                <!-- Cas où il y a au moins une notification -->
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
                          @if ($n->evenement != null)
                          <div class="text-sm font-medium text-gray-500"> <b>Evénement :</b> {{$n->evenement->titre}}</div>
                          @else
                          <div class="text-sm font-medium text-gray-500"> <b>L'événement a été supprimé.</b></div>
                          @endif
                          </div>
                          <div class="text-sm font-medium text-gray-500">{{$n->message}}</div>
                        </div>
                        <div class="sm:grid sm:grid-cols-1">
                          <div class="flex justify-end sm:gap-10 items-center">
                            <!-- Permet d'accepter ou de refuser une demande -->
                            @if ($n->type !== App\Enums\NotifType::Information)
                              <button type="submit" value={{$n->id_notification}}
                                formaction="{{route('accepteNotif')}}"
                                name="bouton"
                                class="bg-green-500 mt-2 hover:bg-green-700 text-white font-bold py-1 px-3 rounded my-2"
                                @if ($n->accepte != null)
                                  hidden
                                @endif
                                >
                                Accepter
                              </button>
                              <button type="submit" value={{$n->id_notification}}
                              formaction="{{route('refuseNotif')}}"
                              name="bouton"
                              class="bg-red-500 mt-2 hover:bg-red-700 text-white font-bold py-1 px-3 rounded my-2"
                              @if ($n->accepte != null)
                                  hidden
                                @endif
                              >
                                Refuser
                                
                              </button>
                            @endif
                            <input class="form-check-input form-check-input mr-5 appearance-none h-8 w-8 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
                            type="checkbox" name="notifications[]" id="inlineBox" value={{$n->id_notification}}>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach
              @endif
              </dl>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
