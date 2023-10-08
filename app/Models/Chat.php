<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $fillable = [
        'message',
        'to_user_id',
        'from_user_id',
    ];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'from_user_id', 'id');
    }

    
}
