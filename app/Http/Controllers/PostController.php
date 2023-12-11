<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.partials.show-posts');
    }
    public function create_post()
    {
        return view('admin.partials.create-post');
    }
}
