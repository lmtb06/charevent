<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Connection</title>
</head>

<body>
    @yield('header')
    <!-- ici c'est la boite avec l'image -->
    <div class="bg-white dark:bg-gray">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover bg-center bg-hand-grass lg:block lg:w-2/3 ">
                <div class="flex items-center h-full ">
                    <div class="absolute items-center h-full lg:w-2/3 bg-gradient-to-tr opacity-40 from-logo-red  to-logo-yellow ">
                    </div>
                    <div class="relative px-20" >
                        <h2 class="text-4xl font-bold text-white opacity-100">CharEvent</h2>
                        
                        <p class="max-w-xl mt-3 text-gray-300"> Le premier reseau social francais de solidarité</p>
                    </div>
                </div>
            </div>
            <!-- ici c'est la partie connection -->
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-red-500 dark:text-white">CharEvent</h2>
                        <p class="mt-3 text-gray-500 dark:text-gray-300">Connectez-vous à CharEvent</p>
                    </div>
    
                    <div class="mt-8">
                        <form>
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200"> addresse email</label>
                                <input type="email" name="email" id="email" placeholder="exemple@exemple.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
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
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-yellow-300 rounded-md hover:bg-yellow-200 focus:outline-none focus:bg-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                    Connection
                                </button>
                            </div>
    
                        </form>
    
                        <p class="mt-6 text-sm text-center text-gray-400">Vous n'avez pas de compte ? <a href="#" class="text-blue-500 focus:outline-none focus:underline hover:underline">Inscrivez-vous</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='content'>
    @yield('content')
    </div>

</body>
</html>