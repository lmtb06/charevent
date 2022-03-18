<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Mail\MdpOublieMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Location;

class ConnexionController extends Controller
{
	public function authenticate(Request $request)
	{
		// Valider le formulaire
		$creds = $request->validate([
			'mail' => 'required|email',
			'hashMDP' => 'required',
			]);

		// Connecter
		if(Auth::attempt($creds)){
            $request->session()->regenerate();

			$events = Evenement::all();
			return redirect()->route('pageAccueil', [
				'events' => $events,
			]);			
		}


		return back()->withErrors([
			'mail' => "L'adresse e-mail n'est pas reconnue par nos services, ou est invalide.",
			'hashMDP' => "Le mot de passe est erroné."
		]);
		
	}

	public function show()
	{
		// Afficher la page de connexion
		return view('layout.connection');
	}


	/**
	 * Affiche la page de mot de passe oublié
	 */
	public function showOubliMDP(){
		return view('oubliMDP');
	}

	public function traitementOubliMDP(Request $request){
		$user = User::where('mail', $request->email)->first();

		// Si un utilisateur a bien été récupéré : 
		if (!is_null($user)){
			// Génération d'un nouveau mot de passe
			$mdp = Str::random(8);
			$hash = Hash::make($mdp);

			// Enregistrement de ce dernier dans la db
			$user->hashMDP = $hash;
			$user->save();

			// Envoi sa version en clair par mail
			Mail::to($user->mail)->send(new MdpOublieMail($user, $mdp));
		}

		// Retourne vers la page de connexion
		return redirect()->route('pageConnexion');
	}



	public function username(){
		return 'mail';
	}
}
