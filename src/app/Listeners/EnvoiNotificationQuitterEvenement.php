<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\ParticipantQuitte;
use App\Models\NotificationSimple;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoiNotificationQuitterEvenement
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
     * @param  \App\Events\ParticipantQuitte  $event
     * @return void
     */
    public function handle(ParticipantQuitte $event)
    {
        $notif = NotificationSimple::firstOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom . " a quitté l'événement ". $event->titre. "."
        ]);
    }
}
