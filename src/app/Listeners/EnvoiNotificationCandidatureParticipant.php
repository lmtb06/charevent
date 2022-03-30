<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\ParticipantAPostule;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\NotificationDemandeParticipation;

class EnvoiNotificationCandidatureParticipant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\ParticipantAPostule  $event
     * @return void
     */
    public function handle(ParticipantAPostule $event)
    {
        // Création de la demande de participation
        $demande = NotificationDemandeParticipation::firstOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." a postulé pour l'événement ". $event->event->titre. ".",
        ]);  
    }
}
