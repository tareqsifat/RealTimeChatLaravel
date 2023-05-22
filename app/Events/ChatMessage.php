<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $message;
    public $receiver;

    /**
     * Create a new event instance.
     *
     * @param string $message
     * @param User $receiver
     */
    public function __construct($message, User $receiver)
    {
        $this->message = $message;
        $this->receiver = $receiver;

        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->receiver->id);
    }
}

