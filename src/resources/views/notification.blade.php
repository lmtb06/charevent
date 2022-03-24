<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full" style="background-color: #E4D9BC;">
@include('bandeau.blade.php')
  <div class="h-full">
  <div class="flex justify-center h-full">
    <div class="max-w-8xl my-16">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full ">
        
        <form method="POST" action="{{route('creerEvenement')}}">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-2xl text-center font-medium text-gray-900 w-full my-6">Notifications</h3>
          </div>

          <div class="bg-white-50 px-4 sm:grid sm:grid-cols-1 sm:gap-10 sm:px-6">
            <div class="flex justify-end">
              <input type="submit" value="Supprimer" class="bg-red-500 mt-6 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-2" Supprimer />
            </div>
          </div>

          <div class="border-t border-gray-200">
            <dl>

              @foreach ($besoins as $b)
                <div class="bg-gray-50 px-2 py-1 sm:px-6 sm:gap-10">
                  <div class="sm:grid sm:grid-cols-2">
                    <div class="sm:grid sm:grid-cols-4">
                      <dt class="text-sm font-medium  justify-center text-gray-500">Début : 01/01/2022</dt>
                      <dt class="text-sm font-medium col-span-3 justify-center text-gray-500">Nom événement A</dt>
                      <dt class="text-sm font-medium  justify-center text-gray-500">Fin : 01/02/2022</dt>
                      <dt class="text-sm font-medium col-span-3 justify-center text-gray-500">{{$b->message}}</dt>
                    </div>
                    <div class="sm:grid sm:grid-cols-2">
                      <div class="flex justify-end items-center">
                        <input class="form-check-input form-check-input mr-5 appearance-none h-8 w-8 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer" type="checkbox" name="inlineBoxOptions" id="inlineBox" value="">
                      </div>
                      <div class="flex justify-end">
                        <input type="submit" value="Plus d'infos" class="bg-blue-500 mt-2 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded my-2" Informations />
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              </dl>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>

</html>