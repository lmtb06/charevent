<?php

namespace App\Events;

use App\Models\Evenement;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EvenementArchive
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $users;
    public Evenement $event;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Evenement $event)
    {
        $this->users = $event->comptes;
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
