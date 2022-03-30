<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionRequest;
use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\LocationApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationInscription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class InscriptionController extends Controller
{

	public function index()
	{
        // Les utilisateurs connectés ne peuvent pas voir la page d'inscription
        if (Auth::check())
            abort(403, 'Veuillez vous déconnecter d\'abord');
		return view('inscription');
	}

	public function create(InscriptionRequest $request)
	{

		// Validation du formulaire
		$validated = $request->validated();

		// Normalisation de l'adresse postale
		$adresse = LocationApi::normalize($validated['ville'], $validated['codeZIP'], $validated['departement']);

		$validated['ville'] = $adresse['ville'];
		$validated['codeZIP'] = $adresse['code_postale'];
		$validated['departement'] = $adresse['departement'];

		// Hash le mot de passe avant de l'entrée dans la base de données
        $validated['password'] = Hash::make($validated['password']);

		// Génère une entrée dans localisation si nécessaire
		$local = Localisation::firstOrCreate([
			'ville' => $validated['ville'],
			'codePostal' => $validated['codeZIP'],
			'departement' => $validated['departement'],
		]);

        // conversion de notification mail en booleen
		if (isset($validated['notificationMail'])){
            $validated['notificationMail'] = true;
		}else{
            $validated['notificationMail'] = false;
		}

		// Création de l'utilisateur et enregistrement de l'avatar

		$user = User::create([
			'mail' => $validated['email'],
			'hashMDP' => $validated['password'],
			'nom' => $validated['nom'],
			'prenom' => $validated['prenom'],
			'dateNaissance' => $validated['birth'],
			'telephone' => $validated['telephone'],
			'notificationMail' => $validated['notificationMail'],
			'id_residence' => $local->id_localisation,
		]);

		if (isset($validated['photo'])){
			// On enregistre la photo
			$nomFichier = $user->id_compte . '.' . $validated['photo']->extension();
			$path = $request->file('photo')->storeAs(
				'avatars',
				$nomFichier, 'public'
			);
			// On sauvegarde le chemin de la photo dans le compte de l'utilisateur
			if ($path) {
				$user->photo = $path;
				$user->saveOrFail();
			} else {
				// La sauvegarde de la photo n'a pas réussi
			}


		};

		// Envoie d'un mail de confirmation d'inscription
		Mail::to($user->mail)->send(new ConfirmationInscription($user));


		// Connexion au compte
		Auth::login($user);

		// Redirection vers la page d'accueil
		return redirect()->route('accueil');
	}
}
