<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SouhaiteSuppressionBesoin;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifieSouhaiteSuppressionBesoin
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
     * @param  \App\Events\SouhaiteSuppressionBesoin  $event
     * @return void
     */
    public function handle(SouhaiteSuppressionBesoin $event)
    {
        $demande = Notification::updateOrCreate([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'id_besoin' => $event->besoin->id_besoin,
            'type' => NotifType::SupprimeBesoin,
            'supprime' => False,
            'accepte' => null,
            'dateChoix' => null,
        ],[
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." souhaite supprimer le besoin " .
                $event->besoin->titre . " de ".$event->event->titre,
        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->event->id_createur);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $demande->message));
        }
    }
}
