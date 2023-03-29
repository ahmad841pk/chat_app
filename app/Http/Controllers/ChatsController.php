<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Admin;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    public function index()
    {
        $messages = Message::with('creator', 'recipient', 'replies')->where('creator_id', Auth::user()->id)->latest()->get();
        $users= Admin::all();
        $conversations = Conversation::where('sender_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->get();
        return view('admin.chat.index', compact('messages','users','conversations'));
    }

    public function fetchMessages()
    {
        return Message::with('creator', 'recipient', 'replies')->where('creator_id', Auth::user()->id)->latest()->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = Message::create([
            'message' => $request->input('message'),
            'user_id' => 1,
        ]);
        event(new MessageSent($user, $message));
        return redirect()->back();
    }
}
