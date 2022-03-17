<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeconnexionController extends Controller
{
	public function __invoke()
	{
		// Deconnecter l'utilisateur
        Auth::logout();
		// Redirection
		return redirect()->route('pageAccueil');
	}
}
