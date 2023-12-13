<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $posts = Post::with('user')->where('user_id', $user->id)->get();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required', 'max:250', 'string',
            'description'    => 'required', 'string',
            'category'       => 'required', 'string',
            'priority_level' => 'required', 'string',
            'media'          => 'nullable', 'mimes:jpg,jpeg,png',
            'link'           => 'nullable',
        ]);

        $request->user()->posts()->create($validated);

        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : View
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {

        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'          => 'required', 'max:250', 'string',
            'description'    => 'required', 'string',
            'category'       => 'required', 'string',
            'priority_level' => 'required', 'string',
            'media'          => 'nullable', 'mimes:jpg,jpeg,png',
            'link'           => 'nullable',
        ]);

        $post->update($validated);

        return Redirect::route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('post.index');
    }
}
