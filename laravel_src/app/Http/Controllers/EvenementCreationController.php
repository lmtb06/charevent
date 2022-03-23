<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\Localisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementCreationController extends Controller
{
    public function show(){
        return view('creationEvenement');
    }

    public function store(Request $request){
        // Valider le formulaire
		$validated = $request->validate([
		'titre' => 'required|string|max:40',
		'description' => 'required|string|min:50|max:1000',
		'departement' => 'required|numeric|digits_between:1,3',
		'ville' => 'required|alpha_dash',
		'codePostal' => 'required|numeric|digits:5',
		'dateDebut' => 'required|date|after:today',
		'dateFin' => 'nullable|date|after:dateDebut',
		'expiration' => 'nullable',
		]);


		// Génère une entrée dans localisation si nécessaire
		$local = Localisation::firstOrCreate([
			'ville' => $request->ville,
			'codePostal' => $request->codePostal,
			'departement' => $request->departement,
		]);

		// Créer une entrée dans la table comptes_actifs
		$user_id = Auth::user()->id_compte;

        $evenement = Evenement::create([
            'id_createur' => $user_id,
            'id_localisation' => $local->id_localisation,
            'titre' => $request->titre,
            'description' => $request->description,
            'dateDebut' => $request->dateDebut,
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
