<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('category.list');
    }

    public function viewCategoriesCreate()
    {
        return view('category.create');
    }

    public function viewCategoriesEdit($id)
    {
        $category = Categories::find($id);
        return view('category.edit', ['category' => $category]);
    }

    public function StoreCategories(Request $request)
    {

        $request->validate(
            [
                'name' => 'string|required',
                'description' => 'string'
            ],
            [
                'name.string' => 'category harus bernilai string',
                'name.required' => 'name wajib di isi',
                'description.string' => 'description harus bernilai string',
            ]
        );

        $data =
            [
                'name' => $request->name,
                'description' => $request->description,
                'created_by' => Auth::user()->name,
            ];

        Categories::create($data);

        return redirect('/categories');
    }

    public function listCategories(Request $request)
    {
        return datatables()
            ->eloquent(Categories::query()->when(!$request->order, function ($query) {
                $query->latest();
            }))
            ->addColumn('action', function ($categories) {
                return '

                <form onsubmit="destroy(event)" action="' . route('categories.destroycategories', $categories->id) . '" method="POST">
                <input type="hidden" name="_token" value="' . @csrf_token() . '">
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-sm btn-danger mr-2">
                <i class="fa fa-trash"></i>
                </button>
                <a href="' . route('categories.viewcategoriesEdit', $categories->id) . '" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></a>
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

    public function destroy(Categories $id)
    {
        $CategoriesDelete = $id->delete();
        if ($CategoriesDelete) {
            Session::flash('success', 'Berhasil menghapus data');
        }

        return redirect()->back();
    }


    public function update(Request $request, Categories $id)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'description' => 'string',
            ],

            [
                'name.string' => 'category harus bernilai string',
                'name.required' => 'name wajib di isi',
                'description.string' => 'description harus bernilai string',

            ]

        );

        $data = [
            'name' => $request->name,
            'description' => $request->description,

        ];

        $CategoriesFind = Categories::find($id->id);

        $CategoriesFind->update($data);

        return redirect('/categories')->with('success', 'Categories berhasil di update');
    }
}
