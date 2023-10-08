<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'body',
    ];

    protected $table = "users_posts";
}
