@extends('layouts.app')

@include('common.header')

@section('css')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container user-show-box01">
    <div class="card user-show w-50 mx-auto">
        <h3 class="card-header text-center py-4"><i class="fas fa-user-alt mr-2"></i>マイページ</h3>
        <div class="card-body pt-2 pb-5">
            <dl class="row justify-content-center">
                <dt>名前</dt>
                <dd>{{ auth()->user()->name}}</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>期生</dt>
                <dd>{{ auth()->user()->term }}期生</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>メールアドレス</dt>
                <dd>{{ auth()->user()->email }}</dd>
            </dl>
            <div class="row justify-content-center">
                <a class="px-4 btn btn-secondary" href="{{ route('top') }}">戻る</a>
                <a class=" px-4 ml-2 btn btn-success" href="#">編集</a>
            </div>
        </div>
    </div>
    <h3 div class="row justify-content-center mt-5">自分の投稿</h3>

    @foreach (auth()->user()->articles as $article)
    <div class="card user-show w-50 mx-auto mb-5">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div><i class="fas fa-user-edit mr-3"></i>投稿日時 : {{ $article->created_at->format('Y-m-d') }}</div>
                <div class="ml-auto btn-box01">
                    <a href="{{ route('articles.edit', ['article' => $article]) }}" class="px-2 btn btn-secondary">編集</a>

                    <form name="deleteform" method="POST" action="{{ route('articles.destroy', $article->id) }}"></form>
                    @method('delete')
                    @csrf
                    <button type="submit" class=" px-2 btn btn-danger " onClick="return Check()">削除</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row justify-content-center">
                <dt>タイトル</dt>
                <dd>{{ $article->title }}</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>URL</dt>
                <dd><a href="{{ $article->url }}" target="_blank" rel="noopener">{{ $article->url }}</a></dd>
            </dl>
            <div class="row justify-content-center">
                <a href="{{ route('articles.show', ['article' => $article]) }}" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
