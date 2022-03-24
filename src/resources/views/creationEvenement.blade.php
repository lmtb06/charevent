<!doctype html>
<html class="h-full">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full scroll-mb-8" style="background-color: #E4D9BC;">
  <?php include 'bandeau.blade.php'; ?>
  <div class="flex justify-center ">
    <div class="max-w-4xl mt-36 mb-24 w-full">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
        <form method="POST" action="{{route('modifierEvenement', ['id' => $event->id_evenement])}}">
          @csrf
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-2xl text-center font-medium text-gray-900 w-full my-6">Création d'un événement</h3>
          </div>
          <div class="border-t border-gray-200">
            <dl>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium justify-center text-gray-500">Nom de l'événement</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="titre" type="text" placeholder="" value="{{$event->titre}}">
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium justify-center text-gray-500">Description de l'événement</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <textarea class="shadow appearance-none border rounded w-full h-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="">{{$event->description}}</textarea>
                </dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Début de l'événement</dt>
                <div class="flex items-center justify-center">
                  <input type="date" id="start" name="dateDebut" value="{{$event->dateDebut}}" max="2050-12-31">
                </div>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Fin de l'événement</dt>
                <div class="flex items-center justify-center">
                  <input type="date" id="end" name="dateFin" value="{{$event->dateFin}}" max="2050-12-31">
                </div>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Ville</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ville" name="ville" type="text" placeholder="" value={{$lieu->ville}}>
                </dd>
              </div>

              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Code postal</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="codepostal" name="codePostal" type="numeric" placeholder="" value={{$lieu->codePostal}}>
                </dd>
              </div>

              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium justify-center text-gray-500">Département</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="departement" name="departement" type="numeric" placeholder="" value={{$lieu->departement}}>
                </dd>
              </div>

              <div class="bg-white-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Durée avant expiration</dt>
                <dd class="flex justify-between mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">1 an</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">6 mois</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio30">3 mois</label>
                  </div>
                </dd>
              </div>

            </dl>
            <div class="flex justify-center">
              <input type="submit" value="Ajouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2" Ajouter />
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
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>