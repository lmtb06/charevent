<?php

namespace App\Events;

use App\Models\BesoinActif;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SuppressionBesoin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public BesoinActif $besoin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(BesoinActif $b)
    {
        $this->besoin = $b;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
