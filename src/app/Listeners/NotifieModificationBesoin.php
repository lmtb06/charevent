<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Notification;
use App\Mail\NotificationMail;
use App\Events\ModificationBesoin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifieModificationBesoin
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
     * @param  \App\Events\ModificationBesoin  $event
     * @return void
     */
    public function handle(ModificationBesoin $event)
    {
        $demande = Notification::create([
            'id_destinataire' => $event->besoin->id_responsable,
            'id_evenement' => $event->besoin->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Un besoin dont vous êtes responsable a été modifié : ". $event->besoin->titre,
            'type' => NotifType::Information,
        ]);

        // Si l'utilisateur souhaite recevoir ses notifications par mail
        $user = User::find($event->besoin->id_responsable);
        if ($user->notificationMail){
            Mail::to($user->mail)->send(new NotificationMail($user, $demande->message));
        }
    }
}
