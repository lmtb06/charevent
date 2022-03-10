<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\User;
use App\Models\Localisation;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
	public function show()
	{
		// Afficher la page d'accueil
		$loc = Localisation::create([
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

		return view('accueil_connecte', [
			'events' => $events,
		]);
	}
}
