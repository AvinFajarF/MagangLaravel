<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Comments $comment)
    {
        return view('post.detail', ['comments' => $comment]);
    }

    public function StoreComment(Request $request)
    {
        Comments::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);
        return back();
    }

    // public function show(Posts $post)
    // {
    //     $data = Comments::where('post_id', $post->id)->get();

    //     return view('post.detail',['comment' => $data]);
    // }
}
