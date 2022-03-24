<section>
    <nav id="bandeau" class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-800 w-full fixed inset-x-0">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{route('accueil')}}">
            <div class="flex items-center">
                    <img src="https://github.com/lmtb06/charevent/blob/main/src/resources/img/logo.png?raw=true" class="mr-3 h-6 sm:h-16" alt="CharEvent" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">CharEvent</span>
                </div>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4 mr-8" value="mes_evenements">Mes événements</button>
                    </li>
                    <li>
                        <form action="{{ route('deconnexion') }}" method="post">
                            @csrf
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4 mr-8">
                                Deconnexion
                            </button>
                        </form>
                    </li>
                    <li>
                        
                        <a href="{{route('pageProfil')}}">
                            <img src="https://cdn-icons-png.flaticon.com/512/64/64572.png" class="mr-8 h-16" alt="Profil" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>