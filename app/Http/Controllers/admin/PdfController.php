<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users  = User::count();
        $posts  = Post::count();
        $period = request('period');

        $periodViews = Post::withCount([
            'viewedBy' => function ($query) use ($period) {
                switch ($period) {
                    case 'daily':
                        $query->where('post_views.created_at', '>=', now()->startOfDay());
                        break;

                    case 'weekly':
                        $query->whereBetween('post_views.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                        break;

                    case 'monthly':
                        $query->whereMonth('post_views.created_at', now()->month);
                        break;

                    case 'yearly':
                        $query->whereYear('post_views.created_at', now()->year);
                        break;

                    default:
                        $query;
                        break;
                }
            }
        ])->get();

        // $total = collect($dailyViews)->sum('viewed_by_count');

        // $pdf = Pdf::loadView('admin.pdf.index', compact('posts', 'users', 'period', 'dailyViews', 'weeklyViews', 'monthlyViews', 'yearlyViews', 'total'));
        // return $pdf->download('invoice.pdf');


        return view('admin.pdf.index', compact('posts', 'users', 'period', 'periodViews'));
    }
}
