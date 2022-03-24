<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recuperation mot de passe</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class = "bg-white">
<!-- ici c'est la boite avec l'image -->
<div class="bg-white dark:bg-gray">
    <div class="flex justify-center h-screen">
        <!-- ici c'est la partie connection -->
        <div class="hidden bg-cover bg-center bg-yellow-500 lg:block lg:w-1/3 ">
            <div class="flex items-center h-full ">
            </div>
        </div>
        <div class=" mt-10 flex content-center justify-center mt-10 px-2 rounded-2xl ">
			<div class="flex items-center w-full max-w-md px-6 mx-auto bg-white">
				<div class="flex-1">
					<div class="text-center">
						<h2 class="text-4xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-red-500 ">CharEvent</h2>
                        <h2 class="text-xl  text-center">Récuperation de mot de passe</h2>
            
                    </div>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">Un mot de passe temporaire vous sera envoyé par email. </p>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">Attention, si nous ne reconnaissons pas votre adresse e-mail, vous ne recevrez pas de nouveau mot de passe.</p>
                

					<div class="mt-8">
						<form method='POST' action='{{ route('connexion')}}'>
							@csrf

							<div class="mt-6">
								<div class="flex justify-between mb-2">
									<label for="password" class="text-sm text-gray-600 dark:text-gray-200">Veuillez entrez votre email </label>
								</div>

								<input type="password" name="password" id="password" placeholder="mot de passe" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
							</div>

                            <div class="flex content-center justify-center mt-6">
                                <input
                                    class=" rounded-full modal-open w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-yellow-300 hover:bg-yellow-200 focus:outline-none focus:bg-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50"
                                    data-modal-toggle="authentication-modal" type="submit"
                                    value="Envoyer un mot de passe temporaire">
                            </div>

						</form>
				
					</div>
				</div>
			</div> 
        </div>
        <div class="hidden bg-cover bg-center bg-yellow-500 lg:block lg:w-1/3 ">
            <div class="flex items-center h-full ">
            </div>
        </div>
    </div>
</div>
<div id='content'>
    @yield('content')
</div>
    

</body>

</html>
