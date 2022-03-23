<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\EvenementArchive;
use App\Models\NotificationDemandeParticipation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    //Affiche l'evenement
	public function show($id)
	{

        $user = Auth::user();
        $event = Evenement::find($id);

		// Récupération de la demande la plus récente 
		$demande = NotificationDemandeParticipation::where([
			['id_evenement', $id],
			['id_compte', $user->id_compte],
		])->orderBy('dateReception', 'DESC')->first();

	
        return view('evenement',[
            'user' => $user,
            'event' => $event,
            'participants' => $event->comptes,
			'demande' => $demande,
        ]);
	}

	//Affiche le formulaire pour modifier l'evenement
	public function edit($id){
		$evenement = Evenement::findOrFail($id);
		print($evenement);
	}
	
	public function update($id, Request $request)
	{
		// Valider le formulaire
		$validated = $request->validate([
			'titre' => 'required|string|max:40',
			'description' => 'required|string|min:50|max:1000',
			'dateDebut' => 'required|date|after:today',
			'dateFin' => 'nullable|date|after:dateDebut',
			'expiration' => 'nullable',
			]);
		
		$evenement = Evenement::findOrFail($id);

		// Mettre à jour le modele utilisateur
		if ($request->filled('titre')) $evenement->titre = $request->titre;
        if ($request->filled('description')) $evenement->description = $request->description;
        if ($request->filled('dateDebut')) $evenement->dateDebut = $request->dateDebut;
		if ($request->filled('dateFin')) $evenement->dateFin = $request->dateFin;
        if ($request->filled('expiration')) $evenement->expiration = $request->expiration;
		$evenement->saveOrFail();	

		// Redirection vers la page d'evenement
		$this->show($id);
	}

	public function delete($id){
		$event = Evenement::find($id);

		$eventarchive = EvenementArchive::create([
            'id_createur' => $event -> id_createur,
            'id_localisation' => $event -> id_localisation,
            'titre' => $event -> titre,
            'description' => $event -> description,
            'dateDebut' => $event -> dateDebut,
            'dateFin' => $event -> dateFin,
        ]);

		$event -> delete();
		
		return redirect()->route('accueil');
	}

}