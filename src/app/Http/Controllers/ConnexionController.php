<?php

namespace App\Http\Controllers;

use App\Models\User;
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
			
			$user = User::find(Auth::id());
			$lieu = $user->localisation;
			return redirect()->intended("pageProfil",
		[
			'user' => $user,
			'lieu' => $lieu,
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
