<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Enums\NotifType;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SouhaiteModificationBesoin;
use App\Models\Notification;
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
        Notification::create([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'id_besoin_en_attente' => $event->b_enAttente->id_besoin,
            'id_besoin_original' => $event->besoin->id_besoin,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." propose de modifier le besoin " .
                $event->besoin->titre . " par : ". $event->b_enAttente->titre .".",
            'type' => NotifType::ModifBesoin,

        ]);
    }
}
