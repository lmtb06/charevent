<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ModifierCompteController extends Controller
{

	/**
	 * Affiche le formulaire pour modifier les informations d'un compte
	 */
	public function edit($id){
		$user = User::findOrFail($id);
		$lieu = $user->localisation;

		return view('modifierProfil', [
			'user' => $user,
			'lieu' => $lieu,
		]);
	}

	/**
	 * Affiche le compte
	 */
	public function show($id)
	{
		// Afficher la page de profil d'un compte
		$user = User::findOrFail($id);
		$lieu = $user->localisation;

		return view('profil', [
			'user' => $user,
			'lieu' => $lieu
		]);
	}

	/**
	 * Traite les modifications du compte
	 */
	public function update($id, Request $request)
	{
		// Récupère les données de l'utilisateur
		$user = User::findOrFail($id);


		// Valider le formulaire
		$validated = $request->validate([
			'mail' => 'required|email|max:255',
			'password' => 'required|confirmed|string|min:8|max:30',
			'nom' => 'required|alpha_dash',
			'prenom' => 'required|alpha_dash',
			'departement' => 'required|numeric|digits_between:1,3',
			'ville' => 'required|alpha_dash',
			'codePostal' => 'required|numeric|digits:5',
			'dateNaissance' => 'required|before:today',
			'numeroTelephone' => 'nullable|digits:10|numeric',
			'photo' => 'nullable',
			]);

		if (!Hash::check($request->hashMDP, $user->hashMDP)){
			return back()->withErrors([
				'mail' => "L'adresse e-mail n'est pas reconnue par nos services, ou est invalide.",
				'hashMDP' => "Le mot de passe est erroné.",
				'MauvaisMDP' => "Le mot de passe est erroné."
			]);
		}

		// Mets à jour le modèle localisation (nouveau ou réutilisation d'une entrée existante)
		$local = Localisation::firstOrCreate([
			'ville' => $request->ville,
			'codePostal' => $request->codePostal,
			'departement' => $request->departement,
		]);

		// Mettre à jour le modele utilisateur
		if ($request->filled('nom')) $user->nom = $request->nom;
        if ($request->filled('prenom')) $user->prenom = $request->prenom;
		$user->notificationMail = !empty($request->notificationMail);
        if ($request->filled('dateNaissance')) $user->dateNaissance = $request->dateNaissance;
        if ($request->filled('mail')) $user->mail = $request->mail;
		if ($request->filled('numeroTelephone')) $user->numeroTelephone = $request->numeroTelephone;
		$user->id_residence = $local->id_localisation;
		$user->saveOrFail();

		// Redirection vers la page de profil
		return redirect()->route('pageProfil', [
			'id' => $id,
		]);
	}
}
