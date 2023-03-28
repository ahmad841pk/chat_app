<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{


    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = Message::create([
            'message' => $request->input('message'),
            'user_id' => 1,
        ]);
        event(new MessageSent($user,$message));
        return redirect()->back();
    }
}
