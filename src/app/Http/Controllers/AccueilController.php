<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
	public function index()
	{
		if (Auth::check()){
			// Afficher la page d'accueil si on est connecté
			$events = Evenement::paginate(20);

			return view('accueil_connecte', [
				"user" => User::find(Auth::id()),
				"message" => "Les événements de l'association",
				"events" => $events,
			]);
		}else{

			// Redirige vers la page de connexion sinon
			return redirect()->route('connexion');
		}
	}
}
