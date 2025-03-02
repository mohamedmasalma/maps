<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AlertEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $followers;

    public function __construct($followers)
    {
        $this->followers = $followers;
    }

    public function broadcastOn()
    {
        $channels = [];

        foreach ($this->followers as $follower) {
            $channels[] = new PrivateChannel('notifications.' . $follower->id);
        }
        return $channels;
    }

    public function broadcastAs()
    {
        return 'new.post';
    }
    public function broadcastWith()
    {
        return [


        ];
    }
}
