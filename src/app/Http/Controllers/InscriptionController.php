<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{

	public function show()
	{
		// Afficher la page d'inscription
		return view('index');
	}
	public function store(Request $request)
	{
		// Valider le formulaire

		// $validated = $request->validate([
		// 	'mail' => 'required|unique:posts|max:255',
		// 	'hashMDP' => 'required',
		// 	'nom' => 'required',
		// 	'prenom' => 'required',
		// 	'departement' => 'required',
		// 	'ville' => 'required',
		// 	'codePostale' => 'required',
		// 	'dateNaissance' => 'required',
		// 	'telephone',
		// 	'photo'
		// ]);

		// Mettre à jour le modele

		// Redirection
	}
}
