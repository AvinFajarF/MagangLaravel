<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function destroy(Comments $id)
    {
        $delete =  $id->destroy($id->id);
        if ($delete) {
            Session::flash("success", "Komentar anda berhasil di deleted");
        }
        return redirect()->back();
    }

    public function update(Comments $id, Request $request)
    {

        $request->validate([
            'content' => 'required'
        ]);

        $data =
            [
                'content' => $request->content
            ];

        $find = Comments::findOrFail($id->id);
        $find->yarbupdate($data);

        return redirect()->back();
    }
}
