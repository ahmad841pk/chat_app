<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_id',
        'message_id',
        'is_read',
    ];

    public function recipient()
    {
        return $this->belongsTo(Admin::class,'recipient_id');
    }

    public function message()
    {
        return $this->belongsTo(Message::class,'message_id');

    }

}
