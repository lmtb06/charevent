<?php

namespace App\Events;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ParticipantQuitte
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public User $user;
    public Evenement $event;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Evenement $event)
    {
        $this->user = $user;
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
