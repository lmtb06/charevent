<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Enums\NotifType;
use App\Events\SuppressionBesoin;
use App\Models\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        Notification::create([
            'id_destinataire' => $event->besoin->id_responsable,
            'id_evenement' => $event->besoin->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Le besoin ". $event->besoin->titre  ." dont vous êtes responsable a été supprimé",
            'type' => NotifType::Information,

        ]);
    }
}
