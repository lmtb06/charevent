<script>
    function myFunction() {
        var x = document.getElementById("menu_perso");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
    }
    </script>

<nav class="bg-white border-bg-orange-300 py-2.5 shadow-lg shadow-red-500 md:shadow-xl">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div class="flex items-center">
            <img src="https://github.com/lmtb06/charevent/blob/main/src/resources/img/logo.png?raw=true" class=" h-6 sm:h-16" alt="CharEvent" />
            <span class="self-center text-xl font-semibold whitespace-nowrap text-center text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-300 ">CharEvent</span>
            <form action="{{ route('deconnexion') }}" method="post" >
                @csrf
                <button class=" hover:text-purple-400 text-indigo-500 italic py-2 px-4 rounded">
                    Deconnexion 
                </button>
            </form>
        </div>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                
                <li>
                    <button onclick="">
                    <a href="#">
                        <img src="https://cdn-icons-png.flaticon.com/512/64/64572.png" class="mr-8 h-10" alt="CharEvent" />
                    </a></button> 
                    
                    <button onclick="myFunction()">
                        <a href="#">
                            <img src="data:image/png;base64,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" class="mr-8 h-10" alt="CharEvent" />
                        </a>
                    </button> 
                    <ul>
                    <div id="menu_perso" style="display:none;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <li><a href="{{route('pageProfil')}}" class="block px-4 py-2 text-sm  hover:text-purple-400 text-indigo-500 " role="menuitem" tabindex="-1" id="user-menu-item-0">mon profil</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm hover:text-purple-400 text-indigo-500 " role="menuitem" tabindex="-1" id="user-menu-item-1">mes événements</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm hover:text-purple-400 text-indigo-500 " role="menuitem" tabindex="-1" id="user-menu-item-2">mes trucs</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm bg-indigo-500 text-white hover:text-purple-400 hover:bg-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Deconnexion</a></li>

                    </div>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>