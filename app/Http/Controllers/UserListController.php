<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function destroy(Request $request,$id)
    {
        $userDelete = User::findOrFail($id);
        $imageDelete = public_path('storage/images/'.$userDelete->images);
        if (File::exists($imageDelete)) {
            File::delete($imageDelete);
        }
        
        $userDelete->destroy($id);

        if ($userDelete) {
            Session::flash('status', `success`);
            Session::flash('message', `Berhasil menghapus data dengan nama {$userDelete->name}`);
        }

        return redirect('/users');
    }
}
