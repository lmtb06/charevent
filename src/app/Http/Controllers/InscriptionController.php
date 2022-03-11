<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{

	public function show()
	{
		// Afficher la page d'inscription
		return view('inscription');
	}
	public function store(Request $request)
	{
		// Valider le formulaire
		$validated = $request->validate([
		'email' => 'required|email|unique:comptes_actifs,mail|max:255',
		'password' => 'required|confirmed|string|min:8|max:30',
		'nom' => 'required|alpha_dash',
		'prenom' => 'required|alpha_dash',
		'departement' => 'required|numeric|digits_between:1,3',
		'ville' => 'required|alpha_dash',
		'codeZIP' => 'required|numeric|digits:5',
		'birth' => 'required|before:today',
		'telephone' => 'nullable|digits:10|numeric',
		'photo' => 'nullable',
		'notifMail' => 'nullable'
		]);


		// Hash le mot de passe avant de l'entrée dans la base de données
		$mdp = Hash::make($request->password);

		// Génère une entrée dans localisation si nécessaire
		$local = Localisation::firstOrCreate([
			'ville' => $request->ville,
			'codePostal' => $request->codeZIP,
			'departement' => $request->departement,
		]);
		if ($request->notifMail == NULL){
			$notif = 0;
		}else{
			$notif = 1;
		}

		// Créer une entrée dans la table comptes_actifs
		$user = User::create([
			'mail' => $request->email,
			'hashMDP' => $mdp,
			'nom' => $request->nom,
			'prenom' => $request->prenom,
			'dateNaissance' => $request->birth,
			'telephone' => $request->telephone,
			'photo' => $request->photo,
			'notificationMail' => $notif,
			'id_residence' => $local->id_localisation,
		]);

		// Redirection vers la page d'accueil
		return redirect()->route('pageAccueil');
	}
}
