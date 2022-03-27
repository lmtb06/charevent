<?php

namespace App\Http\Controllers;

use App\Events\ParticipantQuitte;
use App\Models\BesoinActif;
use App\Models\BesoinArchive;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Localisation;
use App\Models\CompteArchive;
use App\Models\Evenement;
use App\Models\EvenementArchive;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilSuppressionController extends Controller
{
    /**
     * Supprime le compte de l'utilisateur connecté et transfert les données de son compte
     * dans la table d'archivage dédiée
     *
     * @return Response
     */
    public function delete($id, Request $request)
    {
        $creds = $request->validate([
			'password' => 'required'
			]);

        $user = User::findOrFail($id);

        $mdp = Hash::check($creds["password"], $user->hashMDP);
        if(!$mdp) {
            response()->json(['message' => 'Le mot de passe entré est incorrecte.']);
            return redirect()->route('accueil');
        }
        
        $userarchive = CompteArchive::firstOrCreate ([
            'mail' => $user->mail,
            'hashMDP' => $user->hashMDP,
            'nom' => $user->nom,
            'prenom' => $user->prenom,
            'dateNaissance' => $user->dateNaissance,
            'numeroTelephone' => $user->telephone,
            'photo' => $user->photo,
            'notificationMail' => $user->notificationMail,
            'id_residence' => $user->id_residence,
            'dateCreationCompte' => $user->dateCreationCompte,
            'dateModifCompte' => $user->dateModifCompte
        ]);

        // Suppression des participations de ce compte aux événements qu'il n'a pas crée
        $autresEvents = $user->evenements;
        foreach ($autresEvents as $event) {
            event(new ParticipantQuitte($user, $event));
        }

        BesoinActif::where('id_responsable', $user->id_compte)->update('id_responsable', NULL);
        Participant::where('id_compte', $user->id_compte)->delete();

        // Récupération des événements crées par cet utilisateur et suppression de ceux-ci
        $events = $user->createurDe;
        
        // Nettoyage
        foreach ($events as $event) {
            event(new EvenementArchive($event));


            Participant::where('id_evenement', $event->id_evenement)->delete();
            $besoins = BesoinActif::where('id_evenement', $event->id_evenement);

            // Stockage de l'événement dans l'archive
            $ev_arch = EvenementArchive::create([
                'id_localisation' => NULL,
                'id_createur' => $userarchive->id_compte,
                'titre' => $event->titre,
                'description' => $event->description,
                'dateDebut' => $event->dateDebut,
                'dateFin' => $event->dateFin,
                'expiration' => $event->expiration,
            ]);


            foreach ($besoins as $b){
                BesoinArchive::create([
                    'id_responsable' => NULL,
                    'id_evenement' => $ev_arch->id_evenement,
                    'titre' => $b->titre,
                ]);
            }
            $besoins->delete();
            $event->delete();
        }

        $user->delete();
        Auth::logout();

        response()->json(['message' => 'Le compte a été supprimé avec succès.']);
        return redirect()->route('accueil');
    

        

    }
}
