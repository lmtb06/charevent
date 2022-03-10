<!-- On se base sur le modele de base -->
@extends('layout.base')

<!-- Titre de la page -->
@section('title')
Connexion
@endsection

@section('header')
<nav class="flex items-center bg-[#988568] flex-wrap">
      <a href="#" class="p-2 mr-4 inline-flex items-center">
        <div class="mb-4">
            <img src="{{asset('/images/logo.png')}}" alt="charEvent" width="120" height="400">
        </div>
      </a>
      <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">

          <a href="#" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#e4d9bc] hover:text-black">
            <span> <a href="{{ route('pageInscription')}}" >S'inscrire</a> </span>
          </a>

          <a href="#" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#e4d9bc] hover:text-black">
            <span> <a href="{{ route('pageConnexion')}}" >Se connecter</a> </span>
          </a>

        </div>
      </div>
    </nav>
@endsection

<!-- Contenue de la page -->
@section('content')
<body>
    <!-- ici c'est la boite avec l'image -->
    <div class="bg-white dark:bg-gray">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3">
                <div class="flex items-center h-full bg-gray-900 bg-opacity-40">
                    <div>
                        <img src= {{ asset('images/solid1.jpg')}}  alt="description img" >
                        <h2 class="text-4xl font-bold text-white">CharEvent</h2>
                        
                        <p class="max-w-xl mt-3 text-gray-300"> Le premier reseau social francais de solidarité</p>
                    </div>
                </div>
            </div>
            <!-- ici c'est la partie connection -->
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">CharEvent</h2>
                        
                        <p class="mt-3 text-gray-500 dark:text-gray-300">Connectez-vous à CharEvent</p>
                    </div>
    
                    <div class="mt-8">
                        <form method='POST' action={{ route('connecterCompte')}}>
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200"> Addresse email</label>
                                <input type="email" name="mail" id="email" placeholder="exemple@exemple.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
    
                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Mot de passe</label>
                                    <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Mot de passe oublié ?</a>
                                </div>
    
                                <input type="password" name="password" id="password" placeholder="mot de passe" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
    
                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Connexion
                                </button>
                            </div>
                        </form>
                        <p class="mt-6 text-sm text-center text-gray-400">Vous n'avez pas de compte ? <a href="{{ route('pageInscription')}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Inscrivez-vous</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection