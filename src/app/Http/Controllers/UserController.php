<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show()
    {
        //マイページ画面
        return view('user.show');
    }
}
