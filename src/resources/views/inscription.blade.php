@extends('layout.layout')

@section('titre')
    Charevent - Inscription
@endsection

@section('content')
  <body class="h-full pt-10" style="background-color: #E4D9BC;">
  <div class="flex justify-center" style="background-color: #E4D9BC;">
  <div class="w-1/2 mb-10 border border-black rounded-md" style="background-color: white;">
    <form class="m-12" method='POST' action="{{ route('inscription') }}" enctype="multipart/form-data" >
    @csrf
        <div class="relative z-0 mb-10 text-center text-4xl w-full group text-black">
            Inscription
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
          <!--Prénom-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="prenom" id="prenom" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ old('nom') }}" />
              <label for="prenom" class="absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom*</label>
          </div>
          <!--Nom-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required  value="{{ old('prenom') }}"/>
              <label for="nom" class="absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom*</label>
          </div>
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
          <!--Date de naissance-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="date" name="birth" id="birth" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required value="{{ old('birth') }}" />
              <label for="birth" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date de naissance*</label>
          </div>
          <!--Département-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="departement" id="departement" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ old('departement') }}" />
              <label for="departement" class="absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Département*</label>
          </div>
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
          <!--Ville-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="ville" id="ville" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required  value="{{ old('ville') }}"/>
              <label for="ville" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ville*</label>
          </div>
          <!--Code postale-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="number" name="codeZIP" id="codeZIP" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ old('codeZIP') }}"/>
              <label for="codeZIP" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code postale*</label>
          </div>
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
          <!--Téléphone-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="tel" pattern="[0-9]{10}" name="telephone" id="telephone" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ old('telephone') }}"/>
              <label for="telephone" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Téléphone</label>
          </div>
          <!--Photo-->
          <div class="relative z-0 mb-6 w-full group">
              <input type="file" name="photo" id="photo" accept="image/png, image/jpeg" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="photo" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Photo</label>
          </div>
		</div>

		
        
        <!--Email-->
        <div class="relative z-0 mb-6 w-full group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{ old('email') }}"/>
            <label for="email" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email*</label>
        </div>

        <!--Mot de passe-->
        <div class="relative z-0 mb-6 w-full group">
            <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot de passe*</label>
        </div>

        <!--Confirmation mot de passe-->
        <div class="relative z-0 mb-10 w-full group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-black appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password_confirmation" class="absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmation*</label>
        </div>
		

        
        <button type="submit" id="submit" value="S'inscrire" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Valider</button>
    </form>
  </div>
  </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </body>
@endsection