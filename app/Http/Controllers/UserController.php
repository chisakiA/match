<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\Chat;
use App\Models\Like;



class UserController extends Controller
{

    public function edit()

    {
   
        $user = Auth::user();

        return view('user.profile_edit',[ 'user' => $user ]);
   
    }


    public function update(Request $request)
    {   
        $user = Auth::user();
        $user_form = $request->all();
            
            $upload_image = $request->file('image_path');

            if ($upload_image  != null) {
            // storeメソッドで一意のファイル名を自動生成しつつstorage/app/public/profilesに保存し、そのファイル名（ファイルパス）を$profileImagePathとして生成
            $profileImagePath = $upload_image->store('public/profiles');
            // $updateUserのprofile_imageカラムに$profileImagePath（ファイルパス）を保存
            $user_form['image_path'] = $profileImagePath;
        }
        
        unset($user_form['_method']);
        unset($user_form['_token']);
        
        $user->fill($user_form)->save();
        
        return redirect('/profile_edit');
    }

    private function saveProfileImage($image,) {

        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
          
    }


    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /*ユーザープロフィール表示用*/
    public function index()
    {
        $users = User::All();
        return view('user.index', ['users' => $users]);
    }

    //ユーザープロフィール表示画面（個人）
    public function show($id){

        $user = User::find($id);

        $params = [
            'user' => $user,
        ];

         Like::find($id);

        $from_user_id = Auth::user()->id; //ログインユーザーのid取得
        $to_user_id = $user->id;           //ユーザーのid取得



        $like_status = Like::where('from_user_id', $from_user_id) //Likesテーブルデータ取得・チェック
        ->where('to_user_id', $to_user_id)
        ->first(); 

        return view('user.profile_users', $params,compact('like_status'));
    }

    public function matches()
    {
        $auth = User::find(Auth::id());
 //matches()はリレーションのメソッド
        $users = $auth->matches()->orderBy('id','asc')->get();

        return view('user.matches', compact('users'));
    }

    //いいねしたユーザーの取得
    public function favos(Request $request)
    {
        $auth = User::find(Auth::id());
        $users = $auth->favos()->orderBy('id','asc')->get();
        
        return view('user.favorite', compact('users'));
    }



    public function room(User $user)
    {


        $is_match_user=$user->to_users()->where('from_user_id',Auth::id())->exists();
        //$auth = User::find(Auth::id());
        // $is_match_user = $auth->matches()->get()->pluck('id')->contains($user->id);
        
        if ($is_match_user) {

            //get_room_messages()はリレーションのメソッドです。
            //loadCountでリレーション先の個数もリレーションで取得できる。
            $user = $user->loadCount('get_room_messages');

            return view('user.room', compact('user'));
        }
        return  redirect()->route('users.matches');
    }

    public function store_message(Request $request, User $user)
    {
        $message = $request->message;
        $chat = Chat::create(['message' => $message, 'from_user_id' => Auth::id(), 'to_user_id' => $user->id]);

        return 'success';
    }

    public function get_messages(User $user)
    {
        $messages = $user->get_room_messages()->get();

        return $messages;
    }


    
}