<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConnexionController extends Controller
{
	public function authenticate(Request $request)
	{
	// Valider le formulaire
	$creds = $request->validate([
		'email' => 'required|email',
		'password' => 'required',
		]);

		// Connecter
		if(Auth::attempt($creds)){
            $request->session()->regenerate();
			return redirect()->intended("pageAccueil");
		}

		// Redirection vers la page d'accueil
		return back()->withErrors([
			'email' => $request->mail,
			'password' => $request->password,
		]);
	}

	public function show()
	{
		// Afficher la page de connexion
		return view('connexion');
	}
}
