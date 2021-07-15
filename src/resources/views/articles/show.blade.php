@extends('layouts.app')

@include('common.header')

@section('css')
<link href="{{ asset('css/article/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="mt-5 card article-show">
        <div class="card-header text-center font-weight-bold h3">
            <i class="fas fa-file-code mr-2"></i>記事詳細
        </div>
        <div class="card-body">
            <dl class="row justify-content-center">
                <dt>名前</dt>
                <dd>{{ $article->user->name }}</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>期生</dt>
                <dd>{{ $article->user->term }}期生</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>タイトル</dt>
                <dd>{{ $article->title }}</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>カテゴリー</dt>
                <dd>{{ $article->category->name }}</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>記事概要</dt>
                <dd>{{ $article->summary }}</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>URL</dt>
                <dd><a href="{{ $article->url }}" target="_blank" rel="noopener">{{ $article->url }}</a></dd>
            </dl>
            <div class="row my-5 show-btn justify-content-center">
                <a href="/" class="d-inline-block btn btn-secondary">戻る</a>
                @auth
                <a href="{{ route('comments.create', ['article' => $article]) }}" class="d-inline-block btn btn-success"><i class="far fa-comment mr-1"></i>コメント</a>
                    @if(Auth::id() === $article->user->id)
                        <a href="{{ route('articles.edit', ['article' => $article]) }}" class="d-inline-block btn btn-success"><i class="far fa-edit mr-1"></i>編集</a>
                        <form name="deleteform" method="POST" action="{{ route('articles.destroy', $article->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="py-3 ml-2 btn btn-danger" onClick="return Check()"><i class="far fa-trash-alt mr-1"></i>削除</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="show-comment mt-5">
        <p class="h3 text-center my-3"><i class="far fa-comments mr-1"></i>コメント（ @php echo $comments->count()@endphp 件）</p>
        @if ($comments->count())
            <div class="comment-items">
                @foreach ($article->comments as $comment)
                    <dl class="row p-3 bg-white my-4 mx-3 align-items-center">
                        <dt>{{ $comment->user->name }}</dt>
                        <dd class="ml-4 mb-0">{{ $comment->comment }}</dd>
                        @if(Auth::id() === $comment->user->id)
                        <form name="deleteform" method="POST" action="{{ route('comments.destroy', $comment->id) }}" class="ml-auto">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <button type="submit" class="ml-auto delete-comment" onClick="return CheckComment()"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endif
                    </dl>
                @endforeach
            </div>
        @else
            <div class="text-center mt-4">
                <p class="mb-4">コメントはありません。</p>
            </div>
        @endif
    </div>
</div>
@endsection
