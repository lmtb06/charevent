<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
	public function show()
	{
		if (Auth::check()){
			// Afficher la page d'accueil si on est connecté
			$events = Evenement::all();

			return view('accueil_connecte', [
				"events" => $events,
			]);
		}else{

			// Affiche la page de connexion sinon
			return view('layout.connection');
		}

	}
}
