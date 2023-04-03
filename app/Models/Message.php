<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable =[
        'creator_id',
        'conversation_id',
        'message',
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class,'creator_id');
    }
    public function conversation()
    {
        return $this->belongsTo(Conversation::class,'conversation_id');
    }
}
