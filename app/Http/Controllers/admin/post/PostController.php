<?php

namespace App\Http\Controllers\admin\post;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        $category = request('category');
        $searchBy = request('search_by');

        $query = Post::with('user')
            ->orderBy('published_at', 'desc')
            ->latest();

        if ($category) {
            $query->where('category', $category);
        }
        if ($searchBy == 'title') {
            $query->where('title', 'like', '%' . request('query') . '%');
        } elseif ($searchBy == 'author') {
            $query->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . request('query') . '%');
            });
        } elseif ($searchBy == 'date') {
            $query->whereDate('created_at', request('query'));
        }

        $posts = $query->whereBelongsTo($user)->get();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userRole = auth()->user()->roles->first()->name;

        return view('admin.post.create', compact('userRole'));
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
            'published_at'   => ['nullable', 'date', 'after_or_equal:now'],
        ]);

        $publishDate = $request->date('published_at');

        //jika tanggal schedule dipilih
        if ($publishDate) {
            $parsedPublishDate = Carbon::parse($publishDate);
            $validated['published_at'] = $parsedPublishDate;
        } else {
            $validated['published_at'] = Carbon::now();
            $validated['is_published'] = true;
        }

        //upload media
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

        //auto accept jika role user adalah admin
        if (auth()->user()->roles->first()->name === 'admin') {
            $validated['is_accept'] = true;
        }


        $request->user()->posts()->create($validated);

        return Redirect::route('post.index')->with('success', 'Post berhasil disimpan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        //hitung view post
        $user = request()->user();
        if (!$user->viewedPost->contains($post)) {
            $user->viewedPost()->attach($post);
        }

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $userRole = auth()->user()->roles->first()->name;

        return view('admin.post.edit', compact('post', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'          => ['required', 'max:250', 'string'],
            'description'    => ['required', 'string'],
            'category'       => ['required', 'string'],
            'priority_level' => ['required', 'string'],
            'media'          => ['nullable', 'mimes:jpg,jpeg,png'],
            'link'           => ['nullable'],
            'published_at'   => ['nullable', 'date', 'after_or_equal:now'],
        ]);

        $publishDate = $request->date('published_at');

        //jika tanggal schedule dipilih
        if ($publishDate) {
            $parsedPublishDate = Carbon::parse($publishDate);
            $validated['published_at'] = $parsedPublishDate;
        } else {
            $validated['published_at'] = $post->published_at;
        }

        //update media
        if ($request->hasFile('media')) {
            if ($post->media_path) {
                Storage::delete($post->media_path);
            }
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

        $validated['media_path'] = $path ?? $post->media_path;
        $validated['media_type'] = $mediaType ?? $post->media_type;


        //reset persetujuan admin jika post diubah
        if ($post->is_accept == true) {
            $validated['is_accept'] = false;
        }

        $post->update($validated);

        return Redirect::route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->media_path) {
            Storage::delete($post->media_path);
        }
        $post->delete();

        return Redirect::route('post.index');
    }
}
