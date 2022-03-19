<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <title>Mon compte</title>
  </head>
-->
<!-- On se base sur le modele de base -->
@extends('layout.base')

<!-- Titre de la page -->
@section('title')
Mon compte
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
  <body>
    <div class="flex justify-center" style="background-color: #E4D9BC;">
      <div class="max-w-2xl my-16 w-max">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
          <div class="px-4 py-5 sm:px-6">
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <div class="flex -space-x-1 overflow-hidden">
                  <img class="inline-block h-13 w-13 rounded-full ring-2 ring-white" src="https://oasys.ch/wp-content/uploads/2019/03/photo-avatar-profil.png" alt="">
                </div>
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-20 sm:ml-32 sm:col-span-2">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">Mon compte</h3>
              </dd> 
            </div>
          </div>
          <div class="border-t border-gray-200">
            <dl>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Nom</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->nom}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Prénom</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->prenom}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Date de naissance</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->dateNaissance}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Département</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->departement}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Ville</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->ville}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Code postale</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$lieu->codePostal}}</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->mail}}</dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Mot de passe</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">***********</dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->numeroTelephone}}</dd>
              </div>

            </dl>
            <div class="flex justify-center">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">
                <a href={{route('pageModificationCompte', ['id' => $user->id_compte])}}> Modifier mon compte </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection