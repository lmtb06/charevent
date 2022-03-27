
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