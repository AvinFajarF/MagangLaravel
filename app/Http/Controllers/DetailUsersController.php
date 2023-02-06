<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailUsersController extends Controller
{
    public function __invoke($user)
    {

       return view('detail.detail', ['user' => $user]);
    }
}
