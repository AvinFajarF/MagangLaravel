<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        return view('main', [
            'posts' => Posts::paginate(6),
            'pinnedPosts' => Posts::latest()->where('is_pinned', true)->get()
    ]);
    }

    public function detail($slug)
    {
        $data = Posts::where('slug', $slug)->first();
        return view('post.detail', ['data' => $data]);
    }

}
