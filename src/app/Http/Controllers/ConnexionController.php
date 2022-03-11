<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

	public function username(){
		return 'mail';
	}
}
