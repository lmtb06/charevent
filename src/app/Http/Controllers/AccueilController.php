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
			$events = Evenement::paginate(20);

			return view('accueil_connecte', [
				"events" => $events,
			]);
		}else{

			// Redirige vers la page de connexion sinon
			return redirect()->route('page_connexion');
		}

	}
}
