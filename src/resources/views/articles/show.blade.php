@extends('layouts.app')

@include('common.header')

@section('css')
<link href="{{ asset('css/article/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="containerr-fluid">
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
                    @if(Auth::id() === $article->user->id)
                        <a href="{{ route('articles.edit', ['article' => $article]) }}" class="d-inline-block btn btn-success"><i class="far fa-edit mr-1"></i>編集</a>
                        <a href="#" class="d-inline-block btn btn-danger"><i class="far fa-trash-alt mr-1"></i>削除</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
