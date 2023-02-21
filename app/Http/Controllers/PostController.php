<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index()
    {
        return view('post.list');
    }


    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {


        $request->validate(
            [
                'title' => 'string|required',
                'content' => 'string|required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ],
            [
                'title.string' => "title harus bernilai string",
                'tile.required' => "title wajib di isi",
                'content.string' => "content harus bernilai string",
                'content.required' => "content wajib di isi",
                'image.string' => "image harus bernilai string",
                'image.required' => "image wajib di isi"
            ]
        );

        $data =
        [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'created_by' => Auth::user()->name,
        ];
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newImagesName = $request->name . '-' . now()->timestamp . '.' . $extension;

            $request->image->move(public_path('images'), $newImagesName);
            $data['image'] = $newImagesName;
        }

        Posts::create($data);

        return redirect('/posts')->with('success', 'Berhasil membuat post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return datatables()
            ->eloquent(Posts::query()->when(!$request->order, function ($query) {
                $query->latest();
            }))
            ->addColumn('action', function ($posts) {
                return '
                        <form onsubmit="destroy(event)" action="' . route('posts.destroy', $posts->id) . '" method="POST" class="delete-form">
                        <input type="hidden" name="_token" value="' . @csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger mr-2">
                        <i class="fa fa-trash"></i>
                         </button>
                        <a href="' . route('posts.edit', $posts->id) . '" class="btn btn-primary btn-sm"><i class="bi bi-pen"></i></a>
                    </form>
                    ';
            })
            ->editColumn('image', function($user) {
                return '<img src="' . asset('storage/images/' . $user->image) . '" width="50px" class="rounded-circle">';
            })
            ->editColumn('created_by', function ($user) {
                return $user->created_by;
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }


    public function edit($id)
    {
        $postFind = Posts::find($id);
        return view('post.edit',['posts' => $postFind]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'string',
                'content' => 'string',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]
        );

        $data =
        [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'created_by' => Auth::user()->name,
        ];
        $tagsFind = Posts::find($id);

        $tagsFind->update($data);

        return redirect('/tag')->with('success', 'Tag dengan nama ' . $tagsFind->name . ' berhasil di update');
    }


    public function destroy($id)
    {
        $postDelete = Posts::findOrFail($id)->delete();
        if ($postDelete) {
            Session::flash('success', 'Berhasil menghapus data');
        }

        return redirect()->back();
    }

    public function dataTag()
    {
        $tag = Tags::all();
    }
}
