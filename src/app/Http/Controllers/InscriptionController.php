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

		// $validated = $request->validate([
		// 	'mail' => 'required|email|unique:comptes_actifs,mail|max:255',
		// 	'hashMDP' => 'required',
		// 	'nom' => 'required',
		// 	'prenom' => 'required',
		// 	'departement' => 'required',
		// 	'ville' => 'required',
		// 	'codePostale' => 'required',
		// 	'dateNaissance' => 'required',
		// 	'telephone' => 'required',
		// 	'photo' => 'required',
		// ]);

		// Mettre à jour les modeles

		//$mdp = Hash::make($request->hashMDP);

		// Génère une entrée dans localisation si nécessaire
		/*
		$local = Localisation::firstOrCreate([
			'ville' => $request->ville,
			'codePostale' => $request->codePostale,
			'departement' => $request->departement,
		]);

		// Créer une entrée dans la table comptes_actifs
		User::create([
			'mail' => $request->mail,
			'hashMDP' => $mdp,
			'nom' => $request->nom,
			'prenom' => $request->prenom,
			'dateNaissance' => $request->dateNaissance,
			'telephone' => $request->telephone,
			'photo' => $request->photo,
			'id_residence' => $local->id,
		]);
		*/
		// Redirection
	}
}
