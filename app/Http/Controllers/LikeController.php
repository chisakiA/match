<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Like;

class LikeController extends Controller
{
   // only()の引数内のメソッドはログイン時のみ有効
  public function __construct()
  {
    $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
  }


/*いいね機能*/
 public function store(Request $request)
  {
      $from_user_id = Auth::user()->id; //ログインユーザーのid取得
      $to_user_id = $request->to_user_id; //ユーザーのid取得
      $status = $request->status;         //statusの取得

      $already_liked = Like::where('from_user_id', $from_user_id) //Likeテーブルデータ取得 
                              ->where('to_user_id', $to_user_id)
                              ->where('status', $status)
                              ->first(); //3.
  
      if (!$already_liked) { //ユーザーがいいねしていなかった場合
          $like = new Like;       //Likeクラスのインスタンスを作成
          $like->from_user_id = $from_user_id;
          $like->to_user_id = $to_user_id;  //Likeインスタンスにデータを設定
          $like->status = true;
  
          $like->timestamps = false;    // エラー回避用  
          $like->save(); //保存
  
      } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
        $like = new Like;
          Like::where('from_user_id', $from_user_id)
              ->where('to_user_id', $to_user_id)
              ->where('status', $status)
              ->delete();
      }

      return back(); //直前のページに戻る
  }

  
      /*public function store (Request $request, User $user)
    {
        $like_status = Likes::all()->where('status', $request->status)->first();

        if(!$like_status==0){
        $likes = $user->from_users();
        //多対多におけるupdateOrCreate()の変わり。
        
        $likes->syncWithoutDetaching([$request->except('_token')]);
        $status_auth = $likes->wherePivot('to_user_id', Auth::id())->wherePivot('status', true)->exists();
    }else{
        
    }
    return redirect()->route('timeline');
    }*/




}
