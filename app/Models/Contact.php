<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'contact'
    ];

    public function user()
    {
        $this->belongsTo(Admin::class,'user_id');
    }
    public function contact()
    {
        $this->belongsTo(Admin::class,'contact');
    }
}