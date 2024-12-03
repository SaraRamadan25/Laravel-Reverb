<?php
namespace App\Http\Controllers\API;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Send a message and broadcast it.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        event(new MessageSent($request->message));

        return response()->json(['status' => 'Message sent and broadcasted']);
    }
}
