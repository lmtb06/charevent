<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationInscription;
use Illuminate\Support\Facades\Storage;

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
		'nom' => 'required|string|max:100',
		'prenom' => 'required|string|max:100',
		'departement' => 'required|numeric|digits_between:1,3',
		'ville' => 'required|alpha_dash',
		'codeZIP' => 'required|numeric|digits:5',
		'birth' => 'required|before:today',
		'telephone' => 'nullable|digits:10|numeric',
		'photo' => 'nullable|file|max:2024',
		'notifMail' => 'nullable',
		]);


		// Hash le mot de passe avant de l'entrée dans la base de données
		$mdp = Hash::make($validated['password']);

		// Génère une entrée dans localisation si nécessaire
		$local = Localisation::firstOrCreate([
			'ville' => $validated['ville'],
			'codePostal' => $validated['codeZIP'],
			'departement' => $validated['departement'],
		]);
		if ($request->notifMail == NULL){
			$notif = 0;
		}else{
			$notif = 1;
		}

		// Créer une entrée dans la table comptes_actifs et enregistrement de l'avatar
		
		$user = User::create([
			'mail' => $validated['email'],
			'hashMDP' => $mdp,
			'nom' => $validated['nom'],
			'prenom' => $validated['prenom'],
			'dateNaissance' => $validated['birth'],
			'telephone' => $validated['telephone'],
			'notificationMail' => $notif,
			'id_residence' => $local->id_localisation,
		]);

		if (!is_null($request->photo)){
			$nomFichier = time().'.'.$request->photo->extension();
			$img = $request->file('photo')->storeAs(
				'avatars',
				$user->id_compte,
				//'public'
			);

			$user->photo = $img;
		};

		// Envoie d'un mail de confirmation d'inscription
		Mail::to($user->mail)->send(new ConfirmationInscription($user));


		// Connexion au compte
		Auth::login($user);

		// Redirection vers la page d'accueil
		return redirect()->route('page_accueil');
	}
}
