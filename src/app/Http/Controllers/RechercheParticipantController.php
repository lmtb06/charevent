<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
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

        // Traitement de la date
        $ageMin = 1;
        $ageMax = 150;
        if (filled($validated['age_min'])) $ageMin = $validated['age_min'];
        if (filled($validated['age_max'])) $ageMax = $validated['age_max'];

        $min = Carbon::now()->subYears($ageMin)->toDate();
        $max = Carbon::now()->subYears($ageMax)->toDate();

        // Requête si tous les critères concernant l'utilisateurs sont remplis
        $users = User::whereHasTelephone($tel)
            ->whereName($validated['name'])
            ->whereAge($min, $max)
            ->get();


        dd($users);
        // Requête concernant la localisation de l'utilisateurs
    }
}
