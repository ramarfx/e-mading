<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post = $request->route('post');

        if ($post->is_published && $post->is_accept) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk melakukan aksi ini.');
    }
}
