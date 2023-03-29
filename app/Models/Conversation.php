<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
    ];

    public  function sender()
    {
        return $this->belongsTo(Admin::class,'sender_id');
    }
    public  function receiver()
    {
        return $this->belongsTo(Admin::class,'receiver_id');
    }
    public  function messages()
    {
        return $this->hasMany(Message::class);
    }


}