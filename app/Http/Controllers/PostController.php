<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post_Tag;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $coba = Posts::with(['tag', 'category'])->get();
        return view('post.list', ['coba' => $coba]);
    }


    public function create()
    {

        return view('post.create', ['tags' => Tags::all(), 'category' => Categories::all()]);
    }


    public function store(Request $request)
    {


        $request->validate(
            [
                'title' => 'string|required',
                'content' => 'string|required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'tags'  => 'required',
                'categories' => 'required',
            ],
            [
                'title.string' => "title harus bernilai string",
                'tile.required' => "title wajib di isi",
                'content.string' => "content harus bernilai string",
                'content.required' => "content wajib di isi",
                'image.string' => "image harus bernilai string",
                'image.required' => "image wajib di isi",
                'tags.required' => 'Tags wajib di isi',
                'categories.required' => 'Categories wajib di isi',
            ]
        );

        $data =
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'is_pinned' => $request->is_pinned,
                'created_by' => Auth::user()->name,
            ];

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newImagesName = Auth::user()->name . '-' . now()->timestamp . '.' . $extension;

            $request->file('image')->storeAs('images', $newImagesName);
            $request->image->move(public_path('images'), $newImagesName);
            $data['image'] = $newImagesName;
        }


        $post =  Posts::create($data);

        $post->tag()->attach($request->tags);
        $post->category()->attach($request->categories);

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
            ->editColumn('image', function ($user) {
                return '<img src="' . asset('images/' . $user->image) . '" width="50px" class="rounded-circle">';
            })
            ->editColumn('created_by', function ($user) {
                return $user->created_by;
            })
            ->editColumn('is_pinned', function ($post) {
                return $post->is_pinned == 1 ? '<i class="bi bi-pin"></i>' : '<i class="bi bi-dash"></i>';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }


    public function edit($id)
    {
        $postFind = Posts::find($id);
        return view('post.edit', [
            'post' => $postFind, "categories" => Categories::all(),
            "tags" => Tags::all()
        ]);
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
        $tagsFind = Posts::findOrFail($id);

        $data =
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'created_by' => Auth::user()->name,
            ];

        if ($request->is_pinned === null) {
            $data['is_pinned'] = 0;
        } else {
            $data['is_pinned'] = 1;
        }

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newImagesName = Auth::user()->name . '-' . now()->timestamp . '.' . $extension;

            $request->file('image')->storeAs('images', $newImagesName);
            $request->image->move(public_path('images'), $newImagesName);
            $data['image'] = $newImagesName;
        } else {
            $data['image'] = $tagsFind->image;
        }


        $tagsFind->tag()($request->tags);
        $tagsFind->category()($request->categories);
        $tagsFind->update($data);

        return redirect('/posts')->with('success', 'Data Posts berhasil di update');
    }


    public function destroy($id, Request $request)
    {
        $postDelete = Posts::findOrFail($id)->delete();
        $postDelete->tag()->delete($request->tags);
        $postDelete->category()->delete($request->categories);
        if ($postDelete) {
            return response()->json([
                'message' => 'Post deleted successfully.'
            ]);
        }
    }
}
