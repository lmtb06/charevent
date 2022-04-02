@extends('layout.layout')

@section('titre')
    Charevent - Récupération de mot de passe
@endsection

@section('content')
<!DOCTYPE html>
<html lang="fr">
<body class = "bg-white">
<!-- ici c'est la boite avec l'image -->
<div class="lg:bg-blue-300 w-full h-full z-40">
    <div class="flex justify-center h-screen ">
        <div class="flex content-center justify-center lg:mt-10 mb-10 px-2  rounded-full ">
			<div class="flex lg:w-1/3 mb-10 lg:border lg:border-black lg:rounded-md px-6 mt-6 bg-white rounded-xl">

				<div class="flex-1 mt-5">
                    <p class=""><a href="{{route('connexion')}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">
                        <img src="https://github.com/lmtb06/charevent/blob/main/src/resources/img/fleche.png?raw=true" class=" h-6" alt="CharEvent"  />
                    </a></p>
					<div class="text-center mt-2">
                        <h2 class="text-4xl  mt-2 mb-2 font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-yellow-600 ">CharEvent</h2>
                        <span class=" before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-blue-500 relative inline-block">
                            <span class="relative z-0 mb-10 ml-1 mr-1 text-center font-medium text-lg group  text-white"> RÉCUPERATION DE MOT DE PASSE </span>
                        </span>

                    </div>
                    <p class="mt-8 text-gray-500 ">Un mot de passe temporaire vous sera envoyé par email.
                        Attention, si nous ne reconnaissons pas votre adresse e-mail, vous ne recevrez pas de nouveau mot de passe.</p>


					<div class="mt-2">
						<form method='POST' action=''>
							@csrf

							<div class="mt-3">
								<div class="flex justify-between mb-2">
									<label for="email" class="text-sm text-gray-600">Veuillez entrez votre email </label>
								</div>

								<input type="email" name="email" id="email" placeholder="email" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
							</div>

                            <div class="flex content-center justify-center mt-16">
                                <input
                                    class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-150  text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center fond-semibold "
                                    data-modal-toggle="authentication-modal" type="submit"
                                    value="Envoyer un mot de passe temporaire">
                            </div>

						</form>

					</div>
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

@endsection