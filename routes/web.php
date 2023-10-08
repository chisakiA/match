<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('auth/login');
});

	
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/timeline', 'App\Http\Controllers\TimelineController@showTimeline')->name('timeline.show')->middleware('auth');

Route::post('/timeline', 'App\Http\Controllers\TimelineController@userPost')->name('timeline');




//マイプロフィール
Route::get('/profile_edit',[UserController::class,'edit'])->name('user.edit');
Route::post('/profile_edit', [UserController::class,'update'])->name('user.update');



//ユーザープロフィール
Route::get('/profile_users/{user}',[UserController::class,'show'])->name('user.show');
//ユーザープロフィールからいいねする
Route::post('/profile_users/{user}', [LikeController::class, 'store'])->name('users.store');


Route::get('/favorite', [UserController::class, 'favos'])->name('user.favorite');
Route::get('/matches', [UserController::class, 'matches'])->name('user.matches');

Route::get('/index',[UserController::class,'index'])->name('user.index');


//users.room(マッチングしたユーザーとチャットするルート）
Route::get('/room/{user}', [UserController::class, 'room'])->name('user.room');

//messageを送信して保存。
Route::post('/room/{user}/store', [UserController::class, 'store_message'])->name('store_message');
Route::get('/room/{user}/messages', [UserController::class, 'get_messages'])->name('get_messages');

