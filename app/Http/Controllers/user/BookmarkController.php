<?php

namespace App\Http\Controllers\user;

use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookmarkController extends Controller
{
    public function index() : View
    {
        $user = request()->user();
        $posts = $user->bookmarks()->get();

        // $posts = Post::with(['user','bookmarks' => function ($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // }])->get();
        return view('user.bookmark', compact('posts'));

    }

    public function store(Request $request, Post $post)
    {
        $user = $request->user();
        // $post  = Post::find($post);

        // return $post;

        $user->bookmarks()->attach($post->id);

        return redirect()->back();


    }

    public function destroy(Request $request, Post $post)
    {
        $user = $request->user();

        $user->bookmarks()->detach($post->id);
        
        return redirect()->back();
    }
}
