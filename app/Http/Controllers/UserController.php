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
                    <form action="'.route('destroy', $user->id) .'" method="POST">
                    <input type="hidden" name="_token" value="'. @csrf_token() .'">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger mr-2">
                    <i class="fa fa-trash"></i>
                    </button>
                    </td>
                </form>
                    ';
                })
                ->addIndexColumn()
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

}
