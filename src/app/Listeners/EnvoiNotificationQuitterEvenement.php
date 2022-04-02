<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Mail\NotificationMail;
use App\Events\ParticipantQuitte;
use Illuminate\Support\Facades\Mail;
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
        $notif = Notification::firstOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom . " a quitté l'événement ". $event->event->titre. ".",
            'type' => NotifType::Information,

        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->event->id_createur);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $notif->message));
        }
    }
}
