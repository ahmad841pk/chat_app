<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'chat_with',
    ];

    public  function createdBy()
    {
        return $this->belongsTo(Admin::class,'created_by');
    }
    public  function chatWith()
    {
        return $this->belongsTo(Admin::class,'chat_with');
    }
    public  function messages()
    {
        return $this->hasMany(Message::class);
    }


}
