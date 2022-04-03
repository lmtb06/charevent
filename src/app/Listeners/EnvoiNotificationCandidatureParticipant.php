<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Mail\NotificationMail;
use App\Events\ParticipantAPostule;
use Illuminate\Support\Facades\Mail;
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
        $demande = Notification::updateOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'type' => NotifType::PostuleEvent,
            'supprime' => False,
            'accepte' => null,
            'dateChoix' => null,
        ],[
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." a postulé pour l'événement ". $event->event->titre. ".",
        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->event->id_createur);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $demande->message));
        }
    }
}
