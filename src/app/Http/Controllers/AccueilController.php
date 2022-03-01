<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
	public function show()
	{
		// Afficher la page d'accueil
		return view('index');
	}
}
