<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SouhaiteModificationBesoin;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\NotificationModificationBesoin;

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
        NotificationModificationBesoin::create([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'id_besoin_en_attente' => $event->b_enAttente->id_besoin,
            'id_besoin_original' => $event->besoin->id_besoin,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." propose de modifier le besoin " .
                $event->besoin->titre . " par : ". $event->b_enAttente->titre .".",
        ]);
    }
}
