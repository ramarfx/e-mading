<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostCrudAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user && $user->roles->contains('name', 'student')) {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk melakukan aksi ini.');
        }

        return $next($request);
    }
}
