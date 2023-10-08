<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function showTimeline()
    {
        $user = Auth::user();
        $posts = Post::latest()->get();

        return view('timeline', [
            'posts' => $posts,
            'user' => $user 
        ]);
    }

    public function userPost(Request $request)
    {
        $request->validate([
            'body' => 'required|max:140',
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'name'    => Auth::user()->name,
            'body'   => $request->body,
        ]);

        return back();
    }
}