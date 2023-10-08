<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = ['to_user_id','from_user_id','status'];
    protected $table = "likes";

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
