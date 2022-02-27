<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeconnexionController extends Controller
{
	public function __invoke()
	{
		// Deconnecter l'utilisateur

		// Redirection
		return redirect()->route('pageAccueil');
	}
}
