<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\ParticipantEstInvite;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\NotificationInvitationParticipation;

class EnvoiNotificationInvitationParticipant
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
     * @param  \App\Providers\ParticipantEstInvite  $event
     * @return void
     */
    public function handle(ParticipantEstInvite $event)
    {
        NotificationInvitationParticipation::create([
            'id_destinataire' => $event->user->id_compte,
            'id_envoyeur' => $event->event->id_createur,
            'id_evenement' => $event->event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Vous êtes invité à participer à l'événement ".$event->event->titre.".",
        ]);
    }
}
