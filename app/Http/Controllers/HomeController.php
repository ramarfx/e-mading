<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = request('category');
        $searchBy = request('search_by');
        $user = auth()->user();

        $posts = Post::query()
            ->with(['user'])
            ->when(auth()->check(), function ($query) use ($user) {
                $query->with(['user', 'bookmarks' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }]);
            })
            ->where('is_accept', true)
            ->where('is_published', true)
            ->whereDate('published_at', '<=', now())
            ->orderByRaw("FIELD(priority_level, 'penting', 'biasa')")
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
            })
            ->get();


        return view('index', compact('posts'));
    }
}
