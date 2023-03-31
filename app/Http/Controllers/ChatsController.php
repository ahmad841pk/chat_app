<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Admin;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\MessageRecipient;
use App\Notifications\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $users = Admin::all();
        $conversations = Conversation::where('created_by', Auth::user()->id)->orWhere('chat_with', Auth::user()->id)->get();
        $ids = array();
        foreach ($conversations as $conversation) {
            if ($conversation->createdBy->id == $user->id) {
                if (!in_array($conversation->chatWith->id, $ids)) {
                    array_push($ids, $conversation->chatWith->id);
                }
            } else if ($conversation->chatWith->id == $user->id) {
                if (!in_array($conversation->createdBy->id, $ids)) {
                    array_push($ids, $conversation->createdBy->id);
                }
            }
        }
        $active_chat_users = Admin::whereIn('id', $ids)->get();


        return view('admin.chat.index', compact( 'users', 'conversations', 'active_chat_users'));
    }

    public function fetchMessages(Request $request)
    {
        $user_id = $request->user_id;
        $second_user = Admin::find($user_id);

        $conversation = Conversation::with('messages')
            ->where(function ($query) use ($user_id) {
                $query->where('created_by', Auth::user()->id)
                    ->where('chat_with', $user_id);
            })
            ->orWhere(function ($query) use ($user_id) {
                $query->where('created_by', $user_id)
                    ->where('chat_with', Auth::user()->id);
            })
            ->first();
        return response()->json([
            'conversation' => $conversation,
            'current_user'=>Auth::user()->id,
            'second_user' => $second_user
        ]);
    }

    public function sendMessage(Request $request)
    {
        if ($request->input('conversation') == null) {
            $conversation = Conversation::create([
                'created_by' => Auth::user()->id,
                'chat_with' => $request->input('chat_with'),
            ]);
            $conversation_id = $conversation->id;
        } else {
            $conversation_id = $request->input('conversation');
        }
        $message = Message::create([
            'message' => $request->input('message'),
            'conversation_id' => $conversation_id,
            'creator_id' => Auth::user()->id,
        ]);
        $user = Auth::user();
        $chat_with_user = Admin::find($request->input('chat_with'));
        event(new MessageSent($user,$message));
        return response()->json(['conversation_id' => $conversation_id]);
    }
}
