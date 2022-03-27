
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


<nav class="">
    <div class=" flex flex-wrap h-16 w-full justify-between items-center mx-auto bg-white border-bg-orange-300 shadow-lg shadow-red-500 md:shadow-xl fixed inset-x-0">
        <div class="flex items-center">
                <a href="{{route('accueil')}}" CharEvent><img src="https://github.com/lmtb06/charevent/blob/main/src/resources/img/logo3.png?raw=true" class=" h-14" alt="CharEvent"  /> </a>
                <span class="self-center text-xl font-semibold whitespace-nowrap text-center text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-blue-600"><a href="{{route('accueil')}}" CharEvent>CharEvent</span>
        </div>
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                
                <li>
                    <button onclick="">
                    <a href="compte/">
                        <img src="https://github.com/lmtb06/charevent/blob/main/src/public/img/2.png?raw=true" class="mr-8 h-10" alt="CharEvent" />
                    </a></button> 
                    
                    <button onclick="myFunction()">
                            <img src="https://github.com/lmtb06/charevent/blob/main/src/public/img/4.png?raw=true" class="mr-8 h-10" alt="CharEvent" />
                    </button> 
                   
                </li>
            </ul>
    </div>


            <!--Barre de recherche-->
            <section class="p-4 flex items-center justify-center">
                <div class="  bg-orange-200 flex items-start">
                    <div class="bg-orange-200  text-gray-300">
                        <div class="relative bg-white p-2 rounded-3xl border-2 border-orange-800">
                            <svg class="h-6 w-5 absolute left-0 ml-2" fill="black" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search..." class="ml-6 bg-transparent text-black">
    
                        </div>
                    </div>
                    <div class="bg-orange-200 flex items-center justify-center text-gray-300">
                        <div class="relative p-2 ">
                                <svg  class="h-7 w-8 absolute left-0 pointer-events-none" fill="white" viewBox="0 0 24 24" stroke="black" strokeWidth={2}>
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
                </section>
                <!--Barre de recherche FIN-->


    <ul>
        <div id="menu_perso" style="display:none; " class="mt-20 fixed z-40 mr-3 origin-top-right right-0 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <li><a href="{{route('pageProfil')}}" class="block px-4 py-2 text-xl  hover:text-purple-400 text-indigo-500 " role="menuitem" tabindex="-1" id="user-menu-item-0">Mon Profil</a></li>
            <li><a href="#" class="block px-4 py-2 text-xl hover:text-purple-400 text-indigo-500 " role="menuitem" tabindex="-1" id="user-menu-item-1">Mes Evénements</a></li>
            <li><a href="#" class="block px-4 py-2 text-xl hover:text-purple-400 text-indigo-500 " role="menuitem" tabindex="-1" id="user-menu-item-2">Mes Trucs</a></li>
            <li>
                <form method = "POST" action={{ route('deconnexion') }}>
                @csrf
                    <input type="submit"  value="Déconnexion" class=" block px-4 py-2 text-xl hover:text-purple-400 text-indigo-500" role="menuitem" tabindex="-1" id="user-menu-item-3"/></li>
                </form>
        </div>
    </ul>
</nav>