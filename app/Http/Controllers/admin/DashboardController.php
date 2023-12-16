<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $isAdmin     = $currentUser->roles->first()->name == 'admin';

        $users = User::count();
        $posts = $isAdmin ? Post::count() : Post::whereBelongsTo($currentUser)->count();


        //ambil seluruh post jika user adalah admin
        $postQuery  = $isAdmin ? Post::withCount('viewedBy') : Post::whereBelongsTo($currentUser)->withCount('viewedBy');
        $totalViews = $postQuery->get()->sum('viewed_by_count');
        $topViews   = $postQuery->orderBy('viewed_by_count', 'desc')->take(5)->get();

        return view('admin.index', compact('users', 'posts', 'totalViews', 'topViews'));
    }
}
