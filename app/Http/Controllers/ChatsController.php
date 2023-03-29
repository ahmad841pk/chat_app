<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Admin;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\MessageRecipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $messages = Message::with('creator', 'messageRecipient', 'replies')->where('creator_id', Auth::user()->id)->latest()->get();
        $users= Admin::all();
        $conversations = Conversation::where('sender_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->get();
        $ids = array();
     foreach ($conversations as $conversation){
         if($conversation->sender->id == $user->id)
         {
             if(!in_array($conversation->receiver->id,$ids)){
                 array_push($ids,$conversation->receiver->id);
             }
         }
         else if($conversation->receiver->id == $user->id)
         {
             if(!in_array($conversation->sender->id,$ids)){
                 array_push($ids,$conversation->sender->id);
             }
         }
     }
    return $active_chat_users = Admin::with('conversations',function ($query){
         $query->where('receiver_id',Auth::user()->id)->orWhere('sender_id',Auth::user()->id)->latest()->first();
     })->whereIn('id',$ids)->toSql();

        return view('admin.chat.index', compact('messages','users','conversations','active_chat_users'));
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
            'creator_id' => $user->id,
        ]);
        $recipient = MessageRecipient::create([
            'recipient_id'=> 2,
            'message_id'=>$message->id,
        ]);
        Conversation::create([
            'sender_id'=> $user->id,
            'message_id'=>$message->id,
            'receiver_id'=> 2

        ]);
//        event(new MessageSent($user, $message));
        return response()->json(['message_id'=>$message->id]);
    }
}
