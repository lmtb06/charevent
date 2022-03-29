<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SouhaiteSuppressionBesoin;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\NotificationSuppressionBesoin;

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
        NotificationSuppressionBesoin::create([
            'id_destinataire' => $event->event->id_createur,
            'id_envoyeur' => $event->user->id_compte,
            'id_evenement' => $event->event->id_evenement,
            'id_besoin' => $event->besoin->id_besoin,
            'dateReception' => Carbon::now()->toDate(),
            'message' => $event->user->prenom." souhaite supprimer le besoin " .
                $event->besoin->titre . " de ".$event->event->titre
        ]);
    }
}
