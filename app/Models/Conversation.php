<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'message_id',
        'receiver_id',
    ];

    public  function sender()
    {
        return $this->belongsTo(Admin::class,'sender');
    }
    public  function receiver()
    {
        return $this->belongsTo(Admin::class,'receiver_id');
    }
    public  function message()
    {
        return $this->belongsTo(Message::class,'message_id');
    }


}
