<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionRequest;
use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            abort(403,'Veuillez vous déconnecter avant de créer un nouveau compte');
		return view('inscription');
	}

	public function create(InscriptionRequest $request)
	{

		// Validation du formulaire
		$validated = $request->validated();

		// Normalisation de l'adresse postale
		$response = Http::get('https://api-adresse.data.gouv.fr/search/', [
			'q' => $validated['ville'] . ' ' . $validated['codeZIP'] . ' ' . $validated['departement'],
			'type' => 'street',
			'autocomplete' => '0',
			'limit' => '1'
		])->json()['features'][0]['properties'];

		// Verifie que les champs nécessaires sont renseignés
		if (!isset($response['city']) || !isset($response['postcode']) || !isset($response['context']))
			abort(403, "Adresse postale non existante");

		$validated['ville'] = $response['city'];
		$validated['codeZIP'] = $response['postcode'];
		$validated['departement'] = substr($response['context'], 0, 2);

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
			$nomFichier = $user->id_compte.'.'.$validated['photo']->extension();
			$img = $request->file('photo')->storeAs(
				'avatars',
				$nomFichier
			);
			$user->photo = $img;
		};

		// Envoie d'un mail de confirmation d'inscription
		Mail::to($user->mail)->send(new ConfirmationInscription($user));


		// Connexion au compte
		Auth::login($user);

		// Redirection vers la page d'accueil
		return redirect()->route('accueil');
	}
}
