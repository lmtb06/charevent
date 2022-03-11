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
			// Afficher la page d'accueil
			$loc = Localisation::firstOrCreate([
				'ville' => 'dakar',
				'departement' => 'GY',
				'codePostal' => '99'
			]);
			// User::create([
			// 	'nom' => 'Faye',
			// 	'prenom' => 'Moussa',
			// 	'id_localisation' => $loc->id_localisation
			// ]);

			$events = Evenement::all();

			return view('accueil', [
				"events" => $events,
			]);
		}else{
			return view('layout.connection');
		}

	}
}
