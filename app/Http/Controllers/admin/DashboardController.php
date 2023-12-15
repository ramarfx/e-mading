<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $posts  = Post::count();

        $dailyViews = Post::withCount([
            'viewedBy' => function ($query) {
                $query->where('post_views.created_at', '>=', now()->startOfDay());
            }
        ])->get();

        $weeklyViews = Post::withCount([
            'viewedBy' => function ($query) {
                $query->whereBetween('post_views.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            }
        ])->get();

        $monthlyViews = Post::withCount([
            'viewedBy' => function ($query) {
                $query->whereMonth('post_views.created_at', now()->month);
            }
        ])->get();

        $yearlyViews = Post::withCount([
            'viewedBy' => function ($query) {
                $query->whereYear('post_views.created_at', now()->year);
            }
        ])->get();

        // return $dailyViews->toArray();

        return view('admin.index', compact('users', 'posts', 'dailyViews', 'weeklyViews', 'monthlyViews', 'yearlyViews'));
    }
}
