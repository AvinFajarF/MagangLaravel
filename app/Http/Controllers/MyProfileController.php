<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function index()
    {
        return view('my-profile.index');
    }

    public function update(Request $request)
    {
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
            $newImagesName = $request->tanggal_lahir . '-' . now()->timestamp . '.' . $extension;

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

        return redirect('/home');
    }
}
