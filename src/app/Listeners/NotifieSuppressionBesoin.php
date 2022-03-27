<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\SuppressionBesoin;
use App\Models\NotificationSimple;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\NotificationSuppressionBesoin;

class NotifieSuppressionBesoin
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
     * @param  \App\Events\SuppressionBesoin  $event
     * @return void
     */
    public function handle(SuppressionBesoin $event)
    {
        NotificationSimple::create([
            'id_destinataire' => $event->besoin->id_responsable,
            'id_evenement' => $event->besoin->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Le besoin ". $event->besoin->titre  ." dont vous êtes responsable a été supprimé",
        ]);
    }
}
