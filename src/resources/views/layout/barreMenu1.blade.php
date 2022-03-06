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
