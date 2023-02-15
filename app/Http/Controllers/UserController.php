<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function list()
    {
        return datatables()
            ->eloquent(User::query()->where('role','!=','superadmin')->latest())
            ->addColumn('action', function ($user) {
                return '
                    <form action="' . route('destroy', $user->id) . '" method="POST" class="delete-form">
                    <input type="hidden" name="_token" value="' . @csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button onclick="return confirm(`Apakah anda ingin menghapus data ini?`)" class="btn btn-sm btn-danger mr-2">
                    <i class="fa fa-trash"></i>
                    </button>
                    <a href="' . route('user.update', $user->id) . '" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></a>
                </form>
                ';
            })
            ->addColumn('images', function ($user) {
                return  $user->images ?
                    '<img src="' . asset('storage/images/' . $user->images) . '" width="50px" class="rounded-circle">'
                    :
                    '<img src="' . asset('images/person-default-23122312.gif') . '" class="img-circle rounded-circle" width="50px">';
            })
            ->addIndexColumn()
            ->setRowClass(function ($user) {
                return $user->status == 'active' ? '' : 'alert-danger';
            })
            ->escapeColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        return view('user.index');
    }

    public function destroy(User $user)
    {
        $userDelete = $user->delete();
        if ($userDelete) {
            Session::flash('success', 'Berhasil menghapus data');
        }

        return redirect()->back();
    }

    public function detail(User $id)
    {
        return view('user.update', ['users' => $id]);
    }

    public function update(Request $request, User $id)
    {
        $request->validate(
            [
                'name' => 'string',
                'tanggal_lahir' => 'date|nullable',
                'jenis_kelamin' => 'string|nullable',
                'alamat' => 'string|nullable',
                'images' => 'mimes:jpeg,jpg,png|nullable'
            ],
            [
                'name.string' => 'name harus string',
                'tanggal_lahir.date' => 'harus berformat X-X-XXXX',
                'jenis_kelamin.string' => 'jenis kelamin harus string',
                'alamat.string' => 'alamat harus string',
                'images.mimes' => 'Foto harus berextension jpeg,jpg,png',
            ]
        );


        // Request image

        $newImagesName = '' ;


        $data =
        [
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ];
            if ($request->file('images')) {
                $extension = $request->file('images')->getClientOriginalExtension();
                $newImagesName = $request->tanggal_lahir . '-' . now()->timestamp . '.' . $extension;

                $request->file('images')->storeAs('images', $newImagesName);
                $data = [
                    'images' => $newImagesName
                ];
            }



           $find = User::findOrFail($id->id);
           $find->update($data);

          return redirect('/user');
    }

}
