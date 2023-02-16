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
                'name' => 'string',
            ],
            [
                'name.string' => 'category harus bernilai string',
            ]
        );

        $data =
        [
            'name' => $request->name,
            'created_by' => Auth::user()->name,
        ];

        Categories::create($data);

        return redirect('/categories');

    }

    public function listCategories()
    {
        return datatables()
            ->eloquent(Categories::query()->latest())
            ->addColumn('action', function ($categories) {
                return '
                    <form action="' . route('categories.destroycategories', $categories->id) . '" method="POST" class="delete-form">
                    <input type="hidden" name="_token" value="' . @csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button onclick="return confirm(`Apakah anda ingin menghapus data ini?`)" class="btn btn-sm btn-danger mr-2">
                    <i class="fa fa-trash"></i>
                    </button>
                    <a href="' . route('categories.viewcategoriesEdit', $categories->id) . '" class="btn btn-primary btn-sm"><i class="bi bi-pen"></i></a>
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
            ]
        );

        $data = [
            'name' => $request->name,
        ];

        $CategoriesFind = Categories::find($id->id);

        $CategoriesFind->update($data);

        return redirect('/tag')->with('success', 'Categories berhasil di update');
    }



}
