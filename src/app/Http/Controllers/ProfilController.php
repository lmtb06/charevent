<?php

namespace App\Http\Controllers;

use Whoops\Run;
use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfilRequest;
use App\Http\Requests\UpdatePasswordRequest;

class ProfilController extends Controller
{

	/**
	 * Affiche le formulaire pour modifier les informations d'un compte
	 */
	public function edit(){
		$user = User::findOrFail(Auth::id());
		$lieu = $user->localisation;

		return view('modifierProfil', [
			'user' => $user,
			'lieu' => $lieu,
		]);
	}

	/**
	 * Affiche le compte
	 */
	public function show()
	{
		// Afficher la page de profil d'un compte
		$id = Auth::id();
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
	public function update(UpdateProfilRequest $request)
	{
		// Récupère les données de l'utilisateur
		$user = User::findOrFail(Auth::id());
		// Valider le formulaire
		$validated = $request->validated();

		// Mets à jour le modèle localisation (nouveau ou réutilisation d'une entrée existante)
		if (isset($validated['ville']) && isset($validated['codePostal']) && isset($validated['departement'])){
			$local = Localisation::firstOrCreate([
				'ville' => $validated['ville'],
				'codePostal' => $validated['codePostal'],
				'departement' => $validated['departement'],
			]);
		}else{
			$local = $user->id_residence;
		}

		if (isset($request->photo)){
			$nomFichier = $user->id_compte . '.' . $validated['photo']->extension();
			$path = $request->file('photo')->storeAs(
				'avatars',
				$nomFichier, 'public');
			// On sauvegarde le chemin de la photo dans le compte de l'utilisateur
			if ($path) {
				$user->photo = $path;
			} else {
				// La sauvegarde de la photo n'a pas réussi
			}
		}

		// Mettre à jour le modele utilisateur
		if ($request->filled('mail') && $validated['mail'] != $user->mail &&
			(User::where('mail', $validated['mail'])->first() == null)){
				$user->mail = $validated['mail'];
			}
		if ($request->filled('nom')) $user->nom =  $validated['nom'];
        if ($request->filled('prenom')) $user->prenom = $validated['prenom'];

		/*
		if ($request->filled('mdp') && Hash::check($validated['hashMDP'], $user->hashMDP)){
			$user->hashMDP = Hash::make($validated['mdp']);
		}*/
		$user->notificationMail = !empty($validated['notificationMail']);
        if ($request->filled('dateNaissance')) $user->dateNaissance = $validated['dateNaissance'];
		if ($request->filled('numeroTelephone')) $user->numeroTelephone = $validated['numeroTelephone'];
		$user->id_residence = $local->id_localisation;
		$user->saveOrFail();

		// Redirection vers la page de profil
		return redirect()->route('pageProfil');
	}

	public function updatePassword (UpdatePasswordRequest $request){
		$validated = $request->validated();

		

		$user = User::findOrFail(Auth::id());
		if (Hash::check($validated['hashMDP'], $user->hashMDP)){
			$user->hashMDP = Hash::make($validated['mdp']);
			$user->save();
			return redirect()->route('pageProfil'); 

		}else{
			return redirect()->route('pageProfil', [
				'err' => "L'ancien mot de passe n'est pas valide. Votre mot de passe n'a pas été changé."
			]);
		}
	}
}
