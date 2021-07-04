<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{

    public function create()
    {
        return view('articles.create');
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
}
