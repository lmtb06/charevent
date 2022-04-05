@extends('layout.layout')

@section('titre')
    Charevent - Inscription
@endsection

@section('content')

    <body class="">
        <div class="flex justify-center pt-10 w-full h-full lg:bg-blue-300 ">
            <div class="lg:w-1/2 mb-10 lg:border lg:border-black lg:rounded-md bg-white">
                <form class="m-12" method='POST' action="{{ route('inscription') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="relative z-0 mb-10 text-center text-4xl w-full group text-black">
                        <p><a href="{{ route('connexion') }}">
                                <img src="https://github.com/lmtb06/charevent/blob/main/src/resources/img/fleche.png?raw=true"
                                    class=" h-6" alt="retour" />
                            </a></p>

                        <span
                            class=" before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-blue-500 relative inline-block">
                            <span class="relative z-0 mb-10 ml-1 mr-1 text-center text-4xl group font-semibold text-white">
                                INSCRIPTION </span>
                        </span>
                    </div>

                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!--Prénom-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="prenom" id="prenom"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ old('nom') }}" />
                            <label for="prenom"
                                class="absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom*</label>
                        </div>
                        <!--Nom-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="nom" id="nom"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ old('prenom') }}" />
                            <label for="nom"
                                class="absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom*</label>
                        </div>
                    </div>

                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!--Date de naissance-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="date" name="birth" id="birth"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                required value="{{ old('birth') }}" />
                            <label for="birth"
                                class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date
                                de naissance*</label>
                        </div>
                        <!--Département-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="departement" id="departement"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ old('departement') }}" />
                            <label for="departement"
                                class="absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Département*</label>
                        </div>
                    </div>

                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!--Ville-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="ville" id="ville"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ old('ville') }}" />
                            <label for="ville"
                                class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ville*</label>
                        </div>
                        <!--Code postale-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="number" name="codeZIP" id="codeZIP"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ old('codeZIP') }}" />
                            <label for="codeZIP"
                                class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code
                                postale*</label>
                        </div>
                    </div>

                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!--Téléphone-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="tel" pattern="[0-9]{10}" name="telephone" id="telephone"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="{{ old('telephone') }}" />
                            <label for="telephone"
                                class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Téléphone</label>
                        </div>
                        <!--Photo-->
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="file" name="photo" id="photo" accept="image/png, image/jpeg"
                                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="photo"
                                class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Photo</label>
                        </div>
                    </div>



                    <!--Email-->
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="email" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="{{ old('email') }}" />
                        <label for="email"
                            class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email*</label>
                    </div>

                    <!--Mot de passe-->
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="password"
                            class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot
                            de passe*</label>
                    </div>

                    <!--Confirmation mot de passe-->
                    <div class="relative z-0 mb-10 w-full group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="password_confirmation"
                            class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmation*</label>
                        <div class="justify-center w-full">
                            <button type="submit" id="submit" value="S'inscrire"
                            class="mt-4 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-150  text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center fond-semibold ">
                            VALIDER
                        </button>
                        </div>
                        

                    </div>



                    <div>
                        @if ($errors->any())
                            <div class="text-red-700 italic alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>


                </form>
            </div>
        </div>
        </div>


    </body>
@endsection
