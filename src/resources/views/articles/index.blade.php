@extends('layouts.app')

@include('common.header')

@section('content')
<div class="container">
    @if ($articles->count())
        <div class="row justify-content-end">
            <form id='csvform' action="{{ route('csv.export') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary px-3 mr-5 "><i class="fas fa-download mr-2"></i>CSVダウンロード</button>
            </form>
        </div>
    @endif
    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-6">
                <div class="card mx-auto w-100 my-4">
                    <div class="card-header p-2 h4">
                        <i class="fas fa-user-edit m-2 font-weight-bold"></i>
                        <p class="d-inline font-weight-bold">{{ $article->user->name }}</p>
                        <!-- ログインしているユーザーのみ編集と削除ボタンを表示 -->
                        @if(Auth::id() == $article->user->id)
                            <span class="float-right d-flex">
                                <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn btn-secondary rounded-pill">
                                    <i class="far fa-edit mr-1"></i>編集
                                </a>
                                <form name="deleteform" method="POST" action="{{ route('articles.destroy', $article->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger rounded-pill" onClick="return Check()"><i class="far fa-trash-alt mr-1"></i>削除</button>
                                </form>
                            </span>
                        @endif
                    </div>
                    <div class="card-body h5">
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">期生</dt>
                            <dd class="col-8">{{ $article->user->term }}期生</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">タイトル</dt>
                            <dd class="col-8">{{ $article->title }}</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">URL</dt>
                            <dd class="col-8"><a href="{{ $article->url }}" target="_blank" rel="noopener">{{ $article->url }}</a></dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">投稿日時</dt>
                            <dd class="col-8">{{ $article->created_at }}</dd>
                        </dl>
                        <a href="{{ route('articles.show', ['article' => $article]) }}" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $articles->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
