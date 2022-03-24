<?php

namespace App\Http\Controllers;

use App\Http\Helpers\LocationApi;
use App\Http\Requests\UserConnectRequest;
use App\Http\Requests\UserCreationRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Mail\ConfirmationInscription;
use App\Models\Localisation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

/**
 * Controller responsable de la gestion des User (via Api)
 */
class UserController extends Controller
{

	/**
	 * Retourne la liste de tous les utilisateurs dans la base de données
	 *
	 * // TODO Vérifier les permissions
	 *
	 * @param Request $request
	 * @return void
	 */
	public function getUsers(Request $request)
	{
		return response()->json(User::all(), 200);
	}

	/**
	 * Retourne l'User avec l'id correspondant à $id s'il existe sinon un
	 * message d'erreur
	 *
	 * // TODO Vérifier les permissions
	 *
	 * @param Request $request
	 * @param int $id l'id de l'User
	 * @return void
	 */
	public function getUserById(Request $request, int $id)
	{
		$user = User::find($id);

		if (is_null($user)) {
			return response()->json(['message' => 'User not found'], 404);
		}

		return response()->json($user, 200);
	}

	/**
	 * Creer un utilisateur à partir des données transmise via la requête.
	 * Les données sont validés par un UserCreationRequest avant de
	 * sauvegarder l'utilisateur en cas d'echec de validation la fonction
	 * d'echec de validation du UserCreationRequest est appelée
	 *
	 * L'adresse est normalisé ou remplacé par l'adresse le plus proche avant d'être sauvegardé
	 *
	 * Une fois la procédure réussi un code 200 est renvoyé
	 *
	 * @param UserCreationRequest $request
	 * @return void
	 */
	public function create(UserCreationRequest $request)
	{
		// Validation du formulaire
		$validated = $request->validated();

		// Normalisation de l'adresse
		$adresse = LocationApi::normalize($validated['ville'], $validated['code_postale'], $validated['departement']);

		// Hashage du mot de passe
		$validated['password'] = Hash::make($validated['password']);

		// Conversion de notification mail en booleen
		if (isset($validated['notification'])) {
			$validated['notification'] = true;
		} else {
			$validated['notification'] = false;
		}


		// Création de l'adresse si elle n'existe pas sinon on
		// récupére l'existant
		$residence = Localisation::firstOrCreate([
			'ville' => $adresse['ville'],
			'codePostal' => $adresse['code_postale'],
			'departement' => $adresse['departement'],
		]);

		// Création de l'utilisateur
		$user = User::create([
			'mail' => $validated['email'],
			'hashMDP' => $validated['password'],
			'nom' => $validated['nom'],
			'prenom' => $validated['prenom'],
			'dateNaissance' => $validated['naissance'],
			'telephone' => $validated['telephone'],
			'notificationMail' => $validated['notification'],
			'id_residence' => $residence->id_localisation,
		]);

		// Sauvegarde de la photo de profil si elle existe
		if (isset($validated['photo'])) {
			$nomFichier = $user->id_compte . '.' . $validated['photo']->extension();
			$img = $request->file('photo')->storeAs(
				'avatars',
				$nomFichier
			);
			$user->photo = $img;
		};


		// Envoie d'un mail de confirmation
		Mail::to($user->mail)->send(new ConfirmationInscription($user));

		// Connexion au compte
		// TODO

		return response()->json($user, 201);
	}

	public function update(UserUpdateRequest $request, $id = null)
	{
		// Validation du formulaire
		$validated = $request->validated();
		$user = Auth::user();
		// L'utilisateur veut modifier le compte d'un autre utilisateur
		if (isset($id)) {
			// Récupération du compte avec l'id
			$user = User::find($id);

			// Si le compte avec cet id n'existe pas
			if (is_null($user)) {
				return response()->json(['message' => 'User not found'], 404);
			}

			return response()->json($validated, 201);
		}


		if (isset($validated['password'])) {
			// Hashage du mot de passe

			$user->update(['hashMDP' => Hash::make($validated['password'])]);
		}

		if (isset($validated['nom'])) {
			$user->nom = $validated['nom'];
		}

		if (isset($validated['prenom'])) {
			$user->prenom = $validated['prenom'];
		}

		if (isset($validated['departement'])) {
			$user->departement = $validated['departement'];
		}

		if (isset($validated['ville'])) {
			$user->localisation->ville = $validated['ville'];
		}

		if (isset($validated['code_postale'])) {
			$user->localisation->codePostal = $validated['code_postale'];
		}

		if (isset($validated['naissance'])) {
			$user->dateNaissance = $validated['naissance'];
		}

		if (isset($validated['telephone'])) {
			$user->numeroTelephone = $validated['telephone'];
		}

		if (isset($validated['photo'])) {
			$nomFichier = $user->id_compte . '.' . $validated['photo']->extension();
			$img = $request->file('photo')->storeAs(
				'avatars',
				$nomFichier
			);
			$user->photo = $img;
		}

		if (isset($validated['notification'])) {
			$user->notificationMail = true;
		}

		$user->save();

		return response()->json($validated, 201);
	}

	public function connect(UserConnectRequest $request)
	{
		$validated = $request->validated();

		if (Auth::attempt(['mail' => $validated['email'], 'hashMDP' => $validated['password']], false)) {
			$request->session()->regenerate();
			return response()->json(['message', 'Vous n\'etes pas connecte'], 422);
		}

		return response()->json(['message', 'Vous etes connecte'], 200);
	}

	public function disconnect(Request $request)
	{
		// Deconnecter l'utilisateur
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return response()->json(200);
	}
}
