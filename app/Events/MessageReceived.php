<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageReceived implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public string $channel;

    /**
     * Create a new event instance.
     *
     * @param  string  $message
     * @param  string  $channel
     * @return void
     */
    public function __construct(string $message, string $channel)
    {
        $this->message = $message;
        $this->channel = $channel;

        Log::info('Event Data - Message: ' . $this->message . ', Channel: ' . $this->channel);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->channel);
    }

    /**
     * Get the event name to be broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'message.received';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }
}
