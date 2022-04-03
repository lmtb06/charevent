<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Mail\NotificationMail;
use App\Events\ParticipantEstInvite;
use Illuminate\Support\Facades\Mail;
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
        $demande = Notification::updateOrCreate([
            'id_destinataire' => $event->user->id_compte,
            'id_envoyeur' => $event->event->id_createur,
            'id_evenement' => $event->event->id_evenement,
            'type' => NotifType::InviteEvent,
            'supprime' => False,
            'accepte' => null,
            'dateChoix' => null,
        ],[
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Vous êtes invité à participer à l'événement.",

        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->user->id_compte);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $demande->message));
        }
    }
}
