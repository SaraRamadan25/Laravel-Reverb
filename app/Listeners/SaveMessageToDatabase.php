<?php
namespace App\Listeners;

use App\Events\MessageReceived;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class SaveMessageToDatabase
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\MessageReceived  $event
     * @return void
     */
    public function handle(MessageReceived $event)
    {
        Log::info('Message received in listener: ' . $event->message);

        try {
            $message = Message::create([
                'message' => $event->message,
            ]);

            Log::info('Message saved to DB: ' . $message->id);
        } catch (\Exception $e) {
            Log::error('Error saving message: ' . $e->getMessage());
        }
    }
}
