<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnexionRequest;
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
    public function logout(Request $request)
    {
        // Deconnecter l'utilisateur
        Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();
        // Redirection
        return redirect()->route('accueil');
    }

	public function login(ConnexionRequest $request)
	{
		// Valider le formulaire
		$creds = $request->validated();

		// Connecter
		if(Auth::attempt(['mail' => $creds['mail'], 'hashMDP' => $creds['password']])){
            $request->session()->regenerate();
			return redirect()->route('accueil');
		}


		return back()->withErrors([
			'default' => ['L\'adresse mail ou le mot de passe n\'est pas valide']
		]);

	}

	public function index()
	{
		// Les utilisateurs connectés ne peuvent pas voir la page de connexion
		if (Auth::check())
			abort(403, 'Veuillez vous déconnecter d\'abord');
		return view('layout.connexion');
	}

	public function username(){
		return 'mail';
	}
}
