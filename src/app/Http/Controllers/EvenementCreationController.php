<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\Localisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EvenementRequest;

class EvenementCreationController extends Controller
{
    public function show(){
        return view('creationEvenement');
    }

    public function store(EvenementRequest $request){
        // Valider le formulaire
		$validated = $request->validated();


		// Génère une entrée dans localisation si nécessaire
		$local = Localisation::firstOrCreate([
			'ville' => $validated['ville'],
			'codePostal' => $validated['codePostal'],
			'departement' => $request['departement'],
		]);

		// Créer une entrée dans la table comptes_actifs
		$user_id = Auth::user()->id_compte;

        $evenement = Evenement::create([
            'id_createur' => $user_id,
            'id_localisation' => $local->id_localisation,
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'dateDebut' => $validated['dateDebut'],
            'dateFin' => $request->dateFin,
        ]);

		if ($request->expiration != null){
			$newDateTime = Carbon::now();

			switch ($request->expiration){
				case "option1":
					$newDateTime->addYear();
					break;
				case "option2":
					$newDateTime->addMonths(6);
					break;
				case "option3":
					$newDateTime->addMonths(3);
					break;
			}
			$evenement->expiration = $newDateTime;
		}
		$evenement->save();
		// Redirection vers la page d'accueil
		return redirect()->route('pageEvenement', [
			'id' => $evenement->id_evenement
		]);

        
    }
}
