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
        $category = request('category');
        $searchBy = request('search_by');

        $query = Post::query()
            ->where('is_accept', false)
            ->when($category, function ($query) use ($category) {
                return $query->where('category', $category);
            })
            ->when($searchBy, function ($query) use ($searchBy) {
                return $query->when($searchBy == 'title', function ($query) {
                    return $query->where('title', 'like', '%' . request('query') . '%');
                })
            ->when($searchBy == 'author', function ($query) {
                return $query->whereHas('user', function ($query) {
                    return $query->where('name', 'like', '%' . request('query') . '%');
                });
            })
            ->when($searchBy == 'date', function ($query) {
                return $query->whereDate('created_at', request('query'));
            });
            });

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

    public function updateAll()
    {
        Post::where('is_accept', false)->update([
            'is_accept' => true
        ]);

        return Redirect::route('submit.index');
}
}
