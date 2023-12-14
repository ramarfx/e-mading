<?php

namespace App\Http\Controllers\user;

use App\Models\Bookmark;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookmarkController extends Controller
{
    public function index() : View
    {
        $currentUser = auth()->user();
        $bookmarks = Bookmark::with('post')->get();
        return view('user.bookmark', compact('bookmarks'));

    }

    public function create()
    {
        
    }

    public function destroy()
    {

    }
}
