<?php

namespace App\Listeners;

use App\Enums\NotifType;
use Carbon\Carbon;
use App\Events\ParticipantAPostule;
use App\Models\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $demande = Notification::firstOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." a postulé pour l'événement ". $event->event->titre. ".",
            'type' => NotifType::PostuleEvent,
        ]);  
    }
}
