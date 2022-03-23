<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Evenement;
use App\Models\Localisation;
use App\Models\EvenementArchive;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EvenementRequest;
use App\Models\NotificationDemandeParticipation;

class EvenementController extends Controller
{
    //Affiche l'evenement
	public function show($id)
	{
        $event = Evenement::find($id);
		$user = User::find(Auth::id());

		// Récupération de la demande la plus récente 
		$demande = NotificationDemandeParticipation::where([
			['id_evenement', $id],
			['id_envoyeur', $user->id_compte],
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
		if (Auth::id() != $evenement->id_createur){
			return $this->show($id);
		}

		return view('modifierEvent', [
			'user' => User::find(Auth::id()),
			'event' => $evenement,
			'lieu' => $evenement->localisation,
		]);
	
	}
	
	public function update($id, EvenementRequest $request)
	{
		// Valider le formulaire
		$validated = $request->validated();
		
		$evenement = Evenement::findOrFail($id);

		// Génère une entrée dans localisation si nécessaire
		$local = Localisation::firstOrCreate([
			'ville' => $validated['ville'],
			'codePostal' => $validated['codePostal'],
			'departement' => $request['departement'],
		]);

		// Mettre à jour le modele utilisateur
		if ($request->filled('titre')) $evenement->titre = $validated['titre'];
        if ($request->filled('description')) $evenement->description = $validated['description'];
        if ($request->filled('dateDebut')) $evenement->dateDebut = $validated['dateDebut'];
		if ($request->filled('dateFin')) $evenement->dateFin = $validated['dateFin'];
        if ($request->filled('expiration')) $evenement->expiration = $validated['expiration'];
		$evenement->id_localisation = $local->id_localisation;

		if ($request->expiration != null){
			$newDateTime = Carbon::now();

			switch ($request->expiration){
				case "option1":
					$newDateTime->addYear();
					break;
				case "option2":
					$newDateTime->addMonths(6);
					break;
				case "option3":
					$newDateTime->addMonths(3);
					break;
			}
			$evenement->expiration = $newDateTime;
		}
		$evenement->saveOrFail();	

		// Redirection vers la page d'evenement
		$this->show($id);
	}

	public function delete($id){
		$event = Evenement::find($id);

		if (Auth::id() != $event->id_createur){
			return $this->show($id);
		}

		$eventarchive = EvenementArchive::create([
            'id_createur' => $event -> id_createur,
            'id_localisation' => $event -> id_localisation,
            'titre' => $event -> titre,
            'description' => $event -> description,
            'dateDebut' => $event -> dateDebut,
            'dateFin' => $event -> dateFin,
        ]);

		// Prévenir tous les participants ici

		$event -> delete();
		
		return redirect()->route('accueil');
	}

}