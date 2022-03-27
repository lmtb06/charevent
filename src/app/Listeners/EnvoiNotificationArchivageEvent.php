<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\EvenementArchive;
use App\Models\NotificationSimple;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoiNotificationArchivageEvent
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
     * @param  \App\Events\EvenementArchive  $event
     * @return void
     */
    public function handle(EvenementArchive $event)
    {
        foreach ($event->users as $user){
            NotificationSimple::firstOrCreate([
                'id_destinataire' => $user->id_compte,
                'id_envoyeur' => $event->event->id_createur,
                'id_evenement' => $event->event->id_evenement,
                'dateReception' => Carbon::now()->toDate(),
                'message' => "L'événement ". $event->event->titre ." a été archivé.",
            ]);
        }
    }
}
