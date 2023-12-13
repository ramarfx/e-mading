<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_accept', true)
            ->latest()
            ->paginate(4);
        return view('index', compact('posts'));
    }
}
