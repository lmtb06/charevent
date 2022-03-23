<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\NotificationSimple;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationDemandeParticipation;
use App\Models\Participant;

class ParticipantController extends Controller
{
    /**
     * Demande à rejoindre un événement
     *
     * @param int $id
     * @return void
     */
    public function create($id){
        $event = Evenement::findorFail($id);
        $user_id = Auth::id();
        
        if ($user_id == $event->id_createur){
            abort(403, 'Vous ne pouvez pas rejoindre cet événement car vous en êtes le créateur');
        }

        // Création de la demande de participation
        $demande = NotificationDemandeParticipation::firstOrCreate([
            'id_destinataire' => $event->id_createur,
            'id_envoyeur' => $user_id,
            'id_evenement' => $event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
        ]);      


        return redirect()->route('pageEvenement', [
            'id' => $event->id_evenement,
        ]);

    }


    /**
     * Un utilisateur quitte un événement
     *
     * @param int $id
     * @return void
     */
    public function delete ($id){
        $event = Evenement::findorFail($id);
        $user_id = Auth::id();
        $prenom = User::find($user_id)->prenom;
        
        if ($user_id == $event->id_createur){
            abort(403, 'Vous ne pouvez pas quitter cet événement car vous en êtes le créateur');
        }

        // Gestion des besoins dont l'utilisateur est responsable


        // Retire la participation à l'événement de cet utilisateur
        $participation = Participant::where([
            ['id_compte', $user_id],
            ['id_evenement', $event->id_evenement]
        ])->delete();

        // Création de la notification
        $notif = NotificationSimple::firstOrCreate([
            'id_destinataire' => $event->id_createur,
            'id_envoyeur' => $user_id,
            'id_evenement' => $event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $prenom . " a quitté l'événement ". $event->titre. "."
        ]);      


        return redirect()->route('accueil');

    }
}
