<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function list()
    {
        return datatables()
            ->eloquent(User::query()->latest())
            ->addColumn('action', function ($user) {
                return '
                    <form action="' . route('destroy', $user->id) . '" method="POST" class="delete-form">
                    <input type="hidden" name="_token" value="' . @csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button onclick="return confirm(`Apakah anda ingin menghapus data ini?`)" class="btn btn-sm btn-danger mr-2">
                    <i class="fa fa-trash"></i>
                    </button>
                </form>
                ';
            })
            ->addColumn('is_blocked', function($user) {
                return $user->is_blocked != 1 ? 'active' : 'inactive';
            })
            ->addColumn('detail', function ($users) {
                return '
                <form action="' . route('user.detail', $users->id) . '" method="GET">
                <input type="hidden" name="_token" value="' . @csrf_token() . '">
                <button class="btn btn-sm btn-primary mr-2">
                <i class="bi bi-info-circle"></i>
                </button>
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
                return $user->is_blocked == 0 ? '' : 'alert-danger';
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
        // dd("Hello World",$id);
        return view('detail.index', ['users' => $id]);
    }

}
