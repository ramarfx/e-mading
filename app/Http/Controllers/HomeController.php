<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $query = Post::query()
            ->where('is_accept', true)
            ->orderByRaw("FIELD(priority_level, 'penting', 'biasa')");

        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        $posts = $query->get();

        return view('index', compact('posts'));
    }
}
