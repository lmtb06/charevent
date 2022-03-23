<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Localisation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechercheParticipantController extends Controller
{

    /**
     * Affiche la page de recherche de participation
     */
    public function show($id){
        $event = Evenement::findOrFail($id);
        return view('invitation', ['event' => $event]);
    }

    /**
     * Effectue la recherche d'utilisateurs selon les critères définis
     *
     * @param Request $request Objet contenant les inputs de l'utilisateurs
     */
    public function search(Request $request){

        $validated = $request->validate([
            'name'          => 'nullable|string|min:2',
            'departement'   => 'nullable|numeric|digits_between:1,3',
            'ville'         => 'nullable|alpha_dash',
            'age_min'       => 'nullable|numeric|min:1',
            'age_max'       => 'nullable|numeric|gt:age_min',
            'tel'           => 'nullable',
            'id_event'      => 'required'
        ]);

        $event = Evenement::findOrFail($validated['id_event']);
        
        $tel = !is_null($request->tel);

        // Traitement de la date - avec age compris entre 1 et 150 par défaut si les champs sont vides
        $ageMin = 1;
        $ageMax = 150;
        if (filled($validated['age_min'])) $ageMin = $validated['age_min'];
        if (filled($validated['age_max'])) $ageMax = $validated['age_max'];

        $min = Carbon::now()->subYears($ageMin)->toDate();
        $max = Carbon::now()->subYears($ageMax)->toDate();

        // Requête si tous les critères concernant l'utilisateurs
        $users = User::whereHasTelephone($tel)
            ->whereName($validated['name'])
            ->whereAge($min, $max)
            ->get();

        $ville = $validated['ville'];
        $dpt = $validated['departement'];

        // Requête concernant les localisations
        $localisations = Localisation::when($dpt, function ($query, $dpt){
            return $query->where('departement', $dpt);
        })->when($ville, function ($query, $ville){
            return $query->where('ville', 'like', '%'.$ville.'%');
        })
        ->distinct()->get();

        // Filtre les utilisateurs correspondant aux localisations retournées
        $users = $users->intersect($localisations);

        dd($users);

        // TODO: afficher le résultat

    }
}
