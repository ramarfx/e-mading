<?php

namespace App\Http\Controllers\admin\post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AcceptPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $post->update([
            'is_accept' => true
        ]);

        return Redirect::route('post.index');
    }
}
