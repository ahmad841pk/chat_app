<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable =[
        'message_id',
        'creator_id',
        'reply',
    ];

    public function message()
    {
        $this->belongsTo(Message::class,'message_id');
    }
    public function creator()
    {
        $this->belongsTo(Admin::class,'creator_id');
    }
}
