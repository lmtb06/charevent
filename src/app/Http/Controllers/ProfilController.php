<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
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
			'mail' => 'nullable|email|max:255',
			'hashMDP' => 'required|string|min:8|max:30',
			'mdp' => 'nullable|confirmed|string|min:8|max:30',
			'nom' => 'nullable|alpha_dash',
			'prenom' => 'nullable|alpha_dash',
			'departement' => 'nullable|numeric|digits_between:1,3',
			'ville' => 'nullable|alpha_dash',
			'codePostal' => 'nullable|numeric|digits:5',
			'dateNaissance' => 'nullable|before:today',
			'numeroTelephone' => 'nullable|digits:10|numeric',
			'photo' => 'nullable|file|max:2024',
		]);		

		// Mets à jour le modèle localisation (nouveau ou réutilisation d'une entrée existante)
		if (isset($request->ville) && isset($request->codePostal) && isset($request->departement)){
			$local = Localisation::firstOrCreate([
				'ville' => $request->ville,
				'codePostal' => $request->codePostal,
				'departement' => $request->departement,
			]);
		}else{
			$local = $user->id_residence;
		}

		if (isset($request->photo)){
			$nomFichier = time().'.'.$request->photo->extension();
			$img = $request->file('photo')->storeAs(
				'avatars',
				$nomFichier
			);
		}

		// Mettre à jour le modele utilisateur
		if ($request->filled('mail')) $user->mail = $request->mail;
		if ($request->filled('nom')) $user->nom = $request->nom;
        if ($request->filled('prenom')) $user->prenom = $request->prenom;
		if ($request->filled('mdp') && Hash::check($request->filled('mdp'), $user->hashMDP)){
			$user->hashMDP = Hash::make($validated['mdp']);
		}
		$user->notificationMail = !empty($request->notificationMail);
        if ($request->filled('dateNaissance')) $user->dateNaissance = $request->dateNaissance;
		if ($request->filled('numeroTelephone')) $user->numeroTelephone = $request->numeroTelephone;
		$user->id_residence = $local->id_localisation;
		$user->saveOrFail();

		// Redirection vers la page de profil
		return redirect()->route('pageProfil', [
			'id' => $id,
		]);
	}
}
