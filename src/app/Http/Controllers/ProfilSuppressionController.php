<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Localisation;
use App\Models\CompteArchive;
use App\Models\Evenement;
use App\Models\Participant;
use App\Models\BesoinActif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ParticipantController;

class ProfilSuppressionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

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

        // Récupération des besoins auquel cet utilisateur participe
        $besoins = BesoinActif::where('id_responsable', $user->id_compte)->get();
        
        foreach ($besoins as $besoin) {
            $besoin->id_responsable = null;
            $besoin->saveOrFail();
        }

        // Récupération des événements crées par cet utilisateur
        $events = Evenement::where('id_createur', $user->id_compte)->get();
        $evenementcontroller = new EvenementController();
        
        foreach ($events as $event) {
            $evenementcontroller->delete($event->id_evenement);
        }

        // Récupération des événements auquels cet utilisateur participe
        $participations = Participant::where('id_compte', $user->id_compte)->get();
        $participantcontroller = new ParticipantController();
        
        foreach ($participations as $participation) {
            $participantcontroller->delete($participation->id_evenement);
        }

        
        $userarchive = CompteArchive::create([
            'mail' => $user->mail,
            'hashMDP' => $user->hashMDP,
            'nom' => $user->nom,
            'prenom' => $user->prenom,
            'dateNaissance' => $user->dateNaissance,
            'telephone' => $user->telephone,
            'photo' => $user->photo,
            'notificationMail' => $user->notificationMail,
            'id_residence' => $user->id_residence,
            'dateCreationCompte' => $user->dateCreationCompte,
            'dateModifCompte' => $user->dateModifCompte
        ]);

        $user->delete();
        Auth::logout();

        response()->json(['message' => 'Le compte a été supprimé avec succès.']);
        return redirect()->route('accueil');
    

        

    }
}
