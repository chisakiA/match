<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_details extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'body',
        'gender',
        'age',
        'prof',
        'img_name',
        'img_path',
        'created_at',
        'updated_at '

    ];


    protected $table = "users_details";
}
