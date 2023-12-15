<?php

namespace App\Http\Controllers\admin\post;

use Carbon\Carbon;
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
        $currentUser = auth()->user();
        $category = request('category');
        $searchBy = request('search_by');

        $query = Post::with('user')
            ->orderByRaw("FIELD(priority_level, 'penting', 'biasa')")
            ->latest()
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

        $posts = $query->whereBelongsTo($currentUser)->get();


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
            'published_at'   => ['nullable', 'date'],
        ]);

        $publishDate = $request->input('publish_date');

        if($publishDate){
            $parsedPublishDate = Carbon::parse($publishDate);
            $validated['published_at'] = $parsedPublishDate ?? null;
        }else{
            $validated['published_at'] = Carbon::now();
        }
        $parsedPublishDate = Carbon::parse($publishDate);
        $validated['published_at'] = $parsedPublishDate ?? null;



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

        if (auth()->user()->role === 'admin') {
            $validated['is_accept'] = true;
        }


        $request->user()->posts()->create($validated);

        return to_route('post.index')->with('success', 'Post berhasil disimpan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
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

        $validated['media_path'] = $path ?? null;
        $validated['media_type'] = $mediaType ?? null;

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
