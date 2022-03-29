<?php

namespace App\Events;

use App\Models\BesoinActif;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ModificationBesoin
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
