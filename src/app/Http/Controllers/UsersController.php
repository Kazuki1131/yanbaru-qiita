<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        //ユーザーデータ取得
        $auth = Auth::user();
        $articles = Article::where('user_id', $auth->id)->get();

        return view('user.show', ['auth' => $auth, 'articles' => $articles]);
    }
}
