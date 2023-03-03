<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TagsController extends Controller
{

    public function index()
    {
        return view('tag.list');
    }

    public function viewTagCreate()
    {
        return view('tag.create');
    }

    public function viewTagEdit($id)
    {
        $tagsFind = Tags::find($id);
        return view('tag.edit', ['tags' => $tagsFind]);
    }

    public function StoreTag(Request $request)
    {

        $request->validate(
            [
                'tag' => "string",
            ]
        );

        $data =
            [
                'name' => $request->name,
                'description' => $request->description,
                'created_by' => Auth::user()->name,
            ];

        Tags::create($data);

        return redirect('/tag')->with('success', 'Berhasil membuat tag');
    }

    public function listTag(Request $request)
    {
        return datatables()
            ->eloquent(Tags::query()->when(!$request->order, function ($query) {
                $query->latest();
            }))
            ->addColumn('action', function ($tag) {
                return '

                <form onsubmit="destroy(event)" action="' . route('tag.destroyTag', $tag->id) . '" method="POST">
                <input type="hidden" name="_token" value="' . @csrf_token() . '">
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-sm btn-danger mr-2">
                <i class="fa fa-trash"></i>
                </button>
                <a href="' . route('tag.viewTagEdit', $tag->id) . '" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></a>
            </form>
                ';
            })

            ->addColumn('created_by', function ($user) {
                return $user->created_by;
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    public function destroy(Tags $id)
    {
        $tagDelete = $id->delete();
        if ($tagDelete) {
            return response()->json([
                'message' => 'Tag deleted successfully.'
            ]);
        }
    }

    public function update(Request $request, Tags $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'description' => 'string|nullable'
            ],
            [
                'tag.string' => "tag harus bernilai string",
                'description.string' => "description harus bernilai string",
            ]
        );

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $tagsFind = Tags::find($id->id);

        $tagsFind->update($data);

        return redirect('/tag')->with('success', 'Tag dengan nama ' . $tagsFind->name . ' berhasil di update');
    }
}
