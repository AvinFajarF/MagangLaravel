<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $newImagesName = $request->title . '-' . now()->timestamp . '.' . $extension;

            $request->file('image')->storeAs('images', $newImagesName);
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
                        <form action="' . route('posts.destroy', $posts->id) . '" method="POST" class="delete-form">
                        <input type="hidden" name="_token" value="' . @csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit onclick="return confirm(`Apakah anda ingin menghapus data ini?`)" class="btn btn-sm btn-danger mr-2">
                        <i class="fa fa-trash"></i>
                         </button>
                        <a href="' . route('posts.edit', $posts->id) . '" class="btn btn-primary btn-sm"><i class="bi bi-pen"></i></a>
                    </form>
                    ';
            })
            ->editColumn('created_by', function ($user) {
                return $user->created_by;
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postFind = Posts::find($id);
        return view('post.edit',['posts' => $postFind]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postDelete = Posts::findOrFail($id)->delete();
        if ($postDelete) {
            Session::flash('success', 'Berhasil menghapus data');
        }

        return redirect()->back();
    }
}
