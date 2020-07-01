<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventMessager implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $body;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $body)
    {
        $this->body =$body;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-chat.'.$this->body->to);
    }
//    public function broadcastWith(){

//        $this->body->load('fromContact');
//        return ['message'=>$this->body->message];
//    }
}
