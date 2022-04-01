<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Enums\NotifType;
use App\Events\ParticipantEstInvite;
use App\Models\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        Notification::create([
            'id_destinataire' => $event->user->id_compte,
            'id_envoyeur' => $event->event->id_createur,
            'id_evenement' => $event->event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Vous êtes invité à participer à l'événement.",
            'type' => NotifType::InviteEvent,

        ]);
    }
}
