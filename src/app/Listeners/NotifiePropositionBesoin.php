<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Events\ProposeBesoin;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifiePropositionBesoin
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
     * @param  \App\Events\ProposeBesoin  $event
     * @return void
     */
    public function handle(ProposeBesoin $event)
    {
       
        $demande = Notification::updateOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'id_besoin_en_attente' => $event->besoinAttente->id_besoin,
            'type' => NotifType::ProposeBesoin,
            'supprime' => False,
            'accepte' => null,
            'dateChoix' => null,
        ],[
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." propose le besoin "
                . $event->besoinAttente->titre . " pour : ". $event->event->titre,

        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->event->id_createur);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $demande->message));
        }
    }
}
