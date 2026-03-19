<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /** @use HasFactory<\Database\Factories\ChatFactory> */
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'reply_id',
        'message'
    ];

    public function reply(){
        return $this->belongsTo(Chat::class, 'reply_id');
    }

    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
}
