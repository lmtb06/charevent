<?php

namespace App\Events;

use App\Models\BesoinEnAttente;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProposeBesoin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public BesoinEnAttente $besoinAttente;
    public User $user;
    public Evenement $event;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, BesoinEnAttente $b, Evenement $event)
    {
        $this->user = $user;
        $this->besoinAttente = $b;
        $this->event = $event;
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
