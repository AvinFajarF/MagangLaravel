<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UpdateUserController extends Controller
{
    public function index()
    {
        $users = Auth::user();

        Session::flash('username', $users->name);
        Session::flash('tanggal_lahir', $users->tanggal_lahir);
        Session::flash('jenis_kelamin', $users->jenis_kelamin);
        Session::flash('alamat', $users->alamat);

        return view('update.updateusers', ['users' => $users]);
    }

    public function updateUser(Request $request, User $name)
    {
        // Validasi request inputan users
        $request->validate(
            [
                'name' => 'string',
                'tanggal_lahir' => 'date',
                'jenis_kelamin' => 'string',
                'alamat' => 'string',
                'images' => 'mimes:jpeg,jpg,png'
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

        if ($request->file('images')) {
            $extension = $request->file('images')->getClientOriginalExtension();
            $newImagesName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('images')->storeAs('images', $newImagesName);
        }


        $data =
            [
                'name' => $request->name,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'images' => $newImagesName
            ];


        $users = Auth::user();
        $findUser = User::find($users->id);
        $findUser->update($data);
    }
}
