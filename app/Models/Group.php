<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
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
}
