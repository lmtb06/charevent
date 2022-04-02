<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SouhaiteModificationBesoin;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifieSouhaiteModificationBesoin
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
     * @param  \App\Events\SouhaiteModificationBesoin  $event
     * @return void
     */
    public function handle(SouhaiteModificationBesoin $event)
    {
        $demande = Notification::updateOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'id_besoin_en_attente' => $event->b_enAttente->id_besoin,
            'id_besoin_original' => $event->besoin->id_besoin,
            'type' => NotifType::ModifBesoin,
            'supprime' => False,
            'accepte' => null,
            'dateChoix' => null,
        ],[
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." propose de modifier le besoin " .
                $event->besoin->titre . " par : ". $event->b_enAttente->titre .".",
        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->event->id_createur);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $demande->message));
        }
    }
}
