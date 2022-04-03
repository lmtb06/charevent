<?php

namespace App\Events;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReponseNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public User $sender;
    public User $cible;
    public Evenement $evenement;
    public $message;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $sender, User $cible, Evenement $event, $message)
    {
        $this->sender = $sender;
        $this->cible = $cible;
        $this->evenement = $event;
        $this->message = $message;
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
