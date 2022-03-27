<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\ModificationBesoin;
use App\Models\NotificationSimple;
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
        NotificationSimple::create([
            'id_destinataire' => $event->besoin->id_responsable,
            'id_evenement' => $event->besoin->id_evenement,
            'dateReception' => Carbon::now()->toDate(),
            'message' => "Un besoin dont vous êtes responsable a été modifié : ". $event->besoin->titre,
        ]);
    }
}
