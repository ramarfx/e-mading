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
        $users = User::count();
        $posts  = Post::count();

        $totalViews = Post::withCount('viewedBy')->get()->sum('viewed_by_count');
        $topViews = Post::withCount('viewedBy')
            ->orderBy('viewed_by_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.index', compact('users', 'posts', 'totalViews', 'topViews'));
    }
}
