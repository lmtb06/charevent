<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\User;
use App\Models\BesoinActif;
use App\Models\Participant;
use Illuminate\Http\Request;

class ModifierEvenementController extends Controller
{
    //Affiche l'evenement
	public function show($id)
	{
		/*
		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom1',
			'prenom' => 'prenom1',
			'mail' => '1@1.1',
			'hashMDP' => 'abc',
			'dateNaissance' => '2000-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 0,
		]);

		$user = User::create([
			'id_residence' => 1,
			'nom' => 'nom2',
			'prenom' => 'prenom2',
			'mail' => '2@2.2',
			'hashMDP' => 'abc',
			'dateNaissance' => '2000-01-01',
			'dateCreationCompte' => '2022-01-01',
			'dateModifCompte' => '2022-01-01',
			'notificationMail' => 1,
		]);

		$user = BesoinActif::create([
			'id_evenement' => 1,
			'titre' => 'besoin1',
		]);
		
		$user = BesoinActif::create([
			'id_evenement' => 1,
			'titre' => 'besoin2',
			'id_responsable' => 2,
		]);

        $user = Participant::create([
			'id_compte' => 2,
			'id_evenement' => 1,
		]);

        $user = Participant::create([
			'id_compte' => 3,
			'id_evenement' => 1,
		]);
        */

        $evenement = Evenement::findOrFail($id);
		$titre = $evenement -> titre;
		$debut = $evenement -> dateDebut;
		$fin = $evenement -> dateFin;
		$description = $evenement -> description;
		$nbBesoins = BesoinActif::count();
        $participants = Participant::where([['id_evenement', $id],])->get();
        $nbParticipants = Participant::where([['id_evenement', $id],])->count();

		print("Nom d'evenement: " . $titre . "<br>");
		print("Debut: " . $debut . "<br>");
		print("Fin: " . $fin . "<br>");
		if ($nbBesoins > 0){
            print("Besoins: <br>");
		    for ($i = 1; $i <= $nbBesoins; $i++) {
			    print(BesoinActif::findOrFail($i) -> titre . "<br>");
		    }
        }

		print("Description: ");
		print($description . "<br>");
        
        if ($nbParticipants > 0){
            $participants = Participant::where([['id_evenement', $id],])->get();
            print("Participants: <br>");
		    for ($i = 0; $i < $nbParticipants; $i++) {
                $user = User::findOrFail($participants[$i]->getIdCompte());
			    print($user->getNomPrenom() . "<br>");
		    }
        }


	}

	//Affiche le formulaire pour modifier l'evenement
	public function edit($id){
		$evenement = Evenement::findOrFail($id);
		print($evenement);
	}
	
	public function update($id, Request $request)
	{
		// Récupère les données de l'utilisateur
		$evenement = Evenement::findOrFail($id);


		// Valider le formulaire
		$validated = $request->validate([
			'titre' => 'required|string|max:40',
			'description' => 'required|string|min:50|max:1000',
			'dateDebut' => 'required|date|after:today',
			'dateFin' => 'nullable|date|after:dateDebut',
			'expiration' => 'nullable',
			]);

		// Mettre à jour le modele utilisateur
		if ($request->filled('titre')) $evenement->titre = $request->titre;
        if ($request->filled('description')) $evenement->description = $request->description;
        if ($request->filled('dateDebut')) $evenement->dateDebut = $request->dateDebut;
		if ($request->filled('dateFin')) $evenement->dateFin = $request->dateFin;
        if ($request->filled('expiration')) $evenement->expiration = $request->expiration;
		$evenement->saveOrFail();	

		// Redirection vers la page d'evenement
		//Ca marche pas!
		return redirect()->route('pageEvenement', [
			'id' => $id,
		]);
	}
}