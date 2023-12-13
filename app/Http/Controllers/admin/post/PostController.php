<?php

namespace App\Http\Controllers\admin\post;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        if ($user->roles->contains('name', 'admin')) {
            $posts = Post::with('user')->orderByRaw("FIELD(priority_level, 'penting', 'biasa')")->get();
        } else {
            $posts = Post::whereBelongsTo($user)->orderByRaw("FIELD(priority_level, 'penting', 'biasa')")->get();
        }

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
            'title'          => ['required', 'max:250', 'string'],
            'description'    => ['required', 'string'],
            'category'       => ['required', 'string'],
            'priority_level' => ['required', 'string'],
            'media'          => ['nullable', 'file', 'mimes:jpeg,png,gif,webp,mp4,mov,avi,mkv', 'max:20480'],
            'link'           => ['nullable', 'url'],
        ]);

        if ($request->hasFile('media')) {
            $file = $request->file('media');

            $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'mkv'];

            $extension = $file->getClientOriginalExtension();

            if (in_array($extension, array_merge($allowedImageExtensions, $allowedVideoExtensions))) {
                $path = $file->store('posts');
                $mediaType = in_array($extension, $allowedImageExtensions) ? 'image' : 'video';
            } else {
                return back()->with('error', 'File type not supported.');
            }
        }

        $validated['media_path'] = $path ?? null;
        $validated['media_type'] = $mediaType ?? null;

        $request->user()->posts()->create($validated);

        return to_route('post.index')->with('success', 'Post berhasil disimpan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
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

        if ($request->hasFile('media')) {
            $file = $request->file('media');

            $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'mkv'];

            $extension = $file->getClientOriginalExtension();

            if (in_array($extension, array_merge($allowedImageExtensions, $allowedVideoExtensions))) {
                $path = $file->store('posts');
                $mediaType = in_array($extension, $allowedImageExtensions) ? 'image' : 'video';
            } else {
                return back()->with('error', 'File type not supported.');
            }
        }

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
