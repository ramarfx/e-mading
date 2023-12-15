<?php

namespace App\Http\Controllers\admin\post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SubmitPostController extends Controller
{
    public function index()
    {
        $query = Post::where('is_accept', false);

        if(request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        $posts = $query->get();
        
        return view('admin.post.submit', compact('posts'));
    }

    public function update(Post $post)
    {
        $post->update([
            'is_accept' => true
        ]);

        return Redirect::route('submit.index');
    }
}
