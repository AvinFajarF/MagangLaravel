<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        public function list()
        {
            return datatables()
                ->eloquent(User::query()->latest())
                ->addColumn('action', function () {
                    return '
                    <form action="/user/delete" method="POST">
                    <input type="hidden" name="_token" value="'. @csrf_token() .'">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger mr-2">
                    <i class="fa fa-trash"></i>
                    <button type="button" id="{{$lead->id}}"  name="{{$lead->id}}" onclick="deleteRecord(this.id,this)" data-token="{{ csrf_token() }}">Delete</button>
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

    public function destroy(Request $request)
    {
        dd($request->id,$request->all());
    }

}
