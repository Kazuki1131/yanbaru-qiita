<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Article;
use Auth;

class CommentsController extends Controller
{
    public function create(Article $article)
    {
        return view('articles.comment', compact('article'));
    }

    public function store(CommentRequest $request, Comment $comment)
    {
        // Commentモデル作成
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        $article = $comment->article;

        return redirect(route('articles.show', ['article' => $article]));
    }

    public function destroy(Request $request, Comment $comment)
    {
        $article = Article::find($request->article_id);
        $comment->delete();
        return redirect(route('articles.show', ['article' => $article]));
    }
}
