<?php

namespace App\Events;

use App\Models\User;
use App\Models\Evenement;
use App\Models\BesoinActif;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SouhaiteSuppressionBesoin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public User $user;
    public Evenement $event;
    public BesoinActif $besoin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Evenement $event, User $user, BesoinActif $b)
    {
        $this->user = $user;
        $this->event = $event;
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
