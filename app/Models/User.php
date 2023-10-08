<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable


{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        /*追加*/
        'gender',
        'age',
        'prof',
        'image_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


/*いいね機能用*/
    public function from_users()
    {
        return $this->belongsToMany(self::class, "likes", "from_user_id", "to_user_id");
    }

    public function to_users()
    {
        return $this->belongsToMany(self::class, "likes", "to_user_id", "from_user_id");
    }
    //リレーション時、自分のことをいいね(true)しているか、それ以外かを抽出
    public function like_status($filter)
    {
        return $this->belongsToMany(self::class, "likes", "from_user_id", "to_user_id")->wherePivot('status', $filter)->wherePivot('to_user_id', Auth::id());
    }
   //リレーション時、自分とマッチしたユーザーを抽出
    public function matches()
    {
        $ids = $this->to_users()->where('status', true)->pluck('from_user_id');

        return $this->belongsToMany(self::class, "likes", "from_user_id", "to_user_id")->wherePivot('status', true)->wherePivotIn('to_user_id', $ids);
    }

    public function favos()
    {
        return $this->belongsToMany(self::class, "likes", "from_user_id", "to_user_id")->wherePivot('status', true);
    }


    

    //いいねされているかを判定
    public function isLikedBy($request): bool {

        $from_user_id = Auth::user()->id;

        return Like::where('from_user_id', $from_user_id)
                    ->where('to_user_id', $request->to_user_id)
                    ->where('status', $request->status)
                    ->first() !==null;
    }



         public function get_room_messages()
    {
//userがauthにauthがuserに送ったメッセージを取得する必要がある。
        return  $this->chats()->where('to_user_id', Auth::id())->orWhere(function ($q) {
            $q->where('from_user_id', Auth::id())->where('to_user_id', $this->id);
        });

        
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'from_user_id', 'id');
    }
}

