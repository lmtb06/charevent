@extends('layout.base')

<!-- Titre de la page -->
@section('title')
S'inscrire
@endsection

<!--Bandeau commun en haut-->
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
    <fieldset>
    <form method='POST' action={{ route("inscrireCompte") }} >
        @csrf        
        <br/>
        <h2>Inscription</h2>
        <br/>
        
        <label for="nom">Nom *</label>
        <input type="text" name="nom" id="nom" placeholder="Nom" required="required">
        <br/>
        
        <label for="prenom">Prénom *</label>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required="required">
        <br/>
        
        <label for="birth">Date de naissance *</label>
        <input type="date" id="birth" name="birth" required="required">
        <br/>
        
        <label for="departement">Département *</label>
        <input type="text" name="departement" id="departement" placeholder="N° Département" required="required">
        <br/>

        <label for="ville">Ville *</label>
        <input type="text" name="ville" id="ville" placeholder="Ville" required="required">
        <br/>

        <label for="codeZIP">Code postale *</label>
        <input type="text" name="codeZIP" id="codeZIP" placeholder="Code ZIP" required="required">
        <br/>
        
        <label for="email">Email *</label>
        <input type="email" name="email" id="email" placeholder="xxx@xxx.xx" required="required">
        <br/>

        <label for="password">Mot de passe *</label>
        <input type="password" name="password" id="password" required="required">
        <br/>

        <label for="password_confirmation">Confirmation *</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required="required">
        <br/>

        <label for="telephone">Téléphone </label>
        <input type="text" name="telephone" id="telephone" placeholder="Téléphone" >
        <br/>
        
        <label for="photo">Photo </label>
        <input name="photo" type="file" accept="image/png, image/jpeg">
        <br/>

        <br/>
        <input type="checkbox" id="notifMail" name="notifMail" value="notifMail">
        <label for="notifMail"> Recevoir les notifications par mail</label><br>
        <br/>


        <input type="submit" id="submit" value="S'inscrire">
        <a href="{{ route('pageConnexion')}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Retour</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </fieldset>

    
@endsection