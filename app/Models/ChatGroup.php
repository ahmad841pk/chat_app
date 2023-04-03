<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator',
        'name',
        'conversation_id'
    ];

    public function members()
    {
        return $this->belongsToMany(Admin::class, 'group_members', 'group_id', 'member_id');

    }
    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');

    }
}
