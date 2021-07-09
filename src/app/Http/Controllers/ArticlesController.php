<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index()
    {
        //記事を5件ずつcreated_atカラムに対して降順で取得
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->user_id = Auth::id();
        $article->fill($request->all());
        $article->save();
        return redirect()->route('top');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article, Category $category)
    {
        $this->authorize('update', $article);
        $categories = $category->getLists();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $this->authorize('delete', $article);
        $article->delete();
        return redirect('/');

    }
}
