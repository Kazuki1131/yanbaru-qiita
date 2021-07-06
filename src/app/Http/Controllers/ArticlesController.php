<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index()
    {
        //記事を5件ずつcreated_atカラムに対して降順で取得
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        //現在認証しているユーザーのIDを取得
        $user_id = Auth::user()->id;
        return view('articles.index', compact('articles', 'user_id'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
