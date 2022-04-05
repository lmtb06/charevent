@extends('layout.layout')

@section('titre')
Charevent - Création d'un événement
@endsection

@section('content')

  <div class="flex justify-center">
    <form method="POST" class="w-full lg:w-auto" action="{{route('creerEvenement')}}">
      @csrf
      <div class="bg-white lg:shadow lg:border-x-2 lg:border-black overflow-hidden w-full">
          <div class="bg-white px-4 mt-20 mb-4 py-5">
            <span class="self-center -z-0 before:-my-2 whitespace-nowrap text-center before:bg-blue-400 before:block before:absolute before:-inset-1 before:-skew-y-2 relative inline-block">
              <span class="relative -z-0 mb-10 ml-1 mr-1 text-center text-2xl font-semibold group text-white"> CREER UN EVENEMENT </span>
            </span>
          </div>
        <div class="border-t border-gray-200">

          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium justify-center text-gray-500">Nom de l'événement*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input required value="{{ old('titre') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="titre" type="text" placeholder="">
            </dd>
          </div>
          @error('titre')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium justify-center text-gray-500">Description de l'événement*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <textarea required class="shadow appearance-none border rounded w-full h-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Description" name="description" type="text" placeholder="">{{ old('description') }}</textarea>
            </dd>
          </div>
          @error('description')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Début de l'événement*</dt>
            <div class="flex items-center justify-center">
              <input required value="{{ old('dateDebut') }}" type="date" id="start" name="dateDebut" value="2022-01-01" min="2022-01-01" max="2050-12-31">
            </div>
          </div>
          @error('dateDebut')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Fin de l'événement</dt>
            <div class="flex items-center justify-center">
              <input value="{{ old('dateFin') }}" type="date" id="end" name="dateFin" value="2022-01-01" min="2022-01-01" max="2050-12-31">
            </div>
          </div>
          @error('dateFin')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Ville*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input required value="{{ old('ville') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ville" name="ville" type="text" placeholder="">
            </dd>
          </div>
          @error('ville')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-white-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Code postal*</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input required value="{{ old('codePostal') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="codepostal" name="codePostal" type="numeric" placeholder="">
            </dd>
          </div>
          @error('codePostal')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Département</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input required value="{{ old('departement') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="departement" name="departement" type="numeric" placeholder="">
            </dd>
          </div>
          @error('departement')
          <div class="text-red-600 italic alert alert-danger">
            {{ $message }}
          </div>
          @enderror
          <div class="bg-white-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Durée avant expiration</dt>
            <dd class="flex justify-between mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="option1">
                <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">1 an</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option2">
                <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">6 mois</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions3" id="inlineRadio3" value="option3">
                <label class="form-check-label inline-block text-gray-800" for="inlineRadio30">3 mois</label>
              </div>
            </dd>
          </div>

          <div class="flex justify-center">
            <input type="submit" value="Ajouter" class="mt-4 mb-8 modal-open bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 ml-8" Ajouter />
            <button class="mt-4 mb-8 modal-open bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2 ml-8" type="button">Annuler</button>
          </div>
          @if ($errors->any())
          <div class="text-red-700 italic alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        </div>
    </form>
  </div>
@endsection