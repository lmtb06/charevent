@extends('layout.layout')

@section('titre')
    Charevent - Modifier {{ $event->titre }}
@endsection

@section('content')
    <div class="flex justify-center lg:bg-blue-300">
        <form method="POST" id="modifierProfil" name="modifProfil" action="{{ route('modifierEvenement', ['id' => $event->id_evenement]) }}" enctype="multipart/form-data" class="max-w-2xl mt-16 w-full">
            @csrf
            <div class="bg-white lg:shadow lg:border-x-2 lg:border-black overflow-hidden w-full ">
                <div class="px-4 py-5 sm:px-6"> 
                    
                    <div class="px-4 py-5 sm:px-6">
                        <p class=""><a href="{{route('pageEvenement',['id'=>$event->id_evenement])}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">
                            <img src="https://github.com/lmtb06/charevent/blob/main/src/resources/img/fleche.png?raw=true" class=" h-6" alt="CharEvent"  />
                        </a></p>
                        <div class="bg-white text-center px-4 py-5">
                        <span class="self-center -z-0 before:-my-2 whitespace-nowrap text-center before:bg-blue-400 before:block before:absolute before:-inset-1 before:-skew-y-2 relative inline-block">
                          <span class="relative -z-0 mb-10 ml-1 mr-1 text-center text-2xl font-semibold group  text-white"> MODIFIER UN EVENEMENT </span>
                        </span>
                      </div>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>

                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium justify-center text-gray-500">Nom de l'événement</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" name="titre" type="text" placeholder="" value="{{ $event->titre }}">
                                </dd>
                            </div>

                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium justify-center text-gray-500">Description de l'événement</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <textarea class="shadow appearance-none border rounded w-full h-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="description" name="description" type="text"
                                        placeholder="">{{ $event->description }}</textarea>
                                </dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Début de l'événement</dt>
                                <div class="flex items-center justify-center">
                                    <input type="date" id="start" name="dateDebut" value="{{ $event->dateDebut }}"
                                        max="2050-12-31">
                                </div>
                            </div>

                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Fin de l'événement</dt>
                                <div class="flex items-center justify-center">
                                    <input type="date" id="end" name="dateFin" value="{{ $event->dateFin }}"
                                        max="2050-12-31">
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Ville</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="ville" name="ville" type="text" placeholder="" value={{ $lieu->ville }}>
                                </dd>
                            </div>

                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Code postal</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="codepostal" name="codePostal" type="numeric" placeholder=""
                                        value={{ $lieu->codePostal }}>
                                </dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium justify-center text-gray-500">Département</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="departement" name="departement" type="numeric" placeholder=""
                                        value={{ $lieu->departement }}>
                                </dd>



                            </div>

                            



                            <div class="bg-white-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Durée avant expiration</dt>
                                <dd class="flex justify-between mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">1
                                            an</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">6
                                            mois</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio30">3
                                            mois</label>
                                    </div>

                
                                </dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium justify-center text-gray-500">Image de l'événement</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="file" name="photo" id="photo" accept="image/png, image/jpeg"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="photo"
                                class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Photo</label>
                                </dd>


                                
                            </div>

                        </dl>
                        <div class="flex justify-between">
                                <input type="submit" value="Valider"
                                class="ml-44 my-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
                                Valider />
                            <input type="submit" value="Supprimer"
                                class="modal-open mr-44 my-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
                                data-modal-toggle="authentication-modal" Supprimer />
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
                                            <p class="text-2xl font-bold">Confirmation</p>
                                            <div class="modal-close cursor-pointer z-50">
                                                X
                                            </div>
                                        </div>
                                        <!--Body-->
                                        <br>
                                        <p>Êtes-vous sûr de vouloir supprimer cet événement?</p><br>
                                        <div class="flex justify-between pt-2">
                                            <input type="submit"
                                                formaction="{{ route('pageEvenement', ['id' => $event->id_evenement]) }}"
                                                class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"
                                                value="Annuler" />
                                            <input type="submit"
                                                formaction="{{ route('effacerEvenement', ['id' => $event->id_evenement]) }}"
                                                class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2 border"
                                                value="Confirmer" />
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
            </div>
        </form>
    </div>
@endsection
