<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Evenement;
use App\Models\Notification;
use App\Mail\NotificationMail;
use App\Events\ReponseNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoiReponseNotif
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
     * @param  \App\Events\ReponseNotification  $event
     * @return void
     */
    public function handle(ReponseNotification $event)
    {
        $sender = $event->sender;
        $cible = $event->cible;
        $evenement = $event->evenement;
        $message = $event->message;

        $notif = Notification::updateOrCreate([
            'id_destinataire' => $cible->id_compte,
            'id_envoyeur' => $sender->id_compte,
            'id_evenement' => $evenement->id_evenement,
            'message' => $message,
            'type' => NotifType::Information,
        ],[
            'dateReception' => Carbon::now()->toDate(),
        ]);

        
        if ($cible->notificationMail){
            Mail::to($cible->mail)->send(new NotificationMail($cible, $notif->message));
        }
    }
}
