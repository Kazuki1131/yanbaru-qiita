@extends('layouts.app')

@include('common.header')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center my-4">
        <form action="{{ route('articles.search') }}">
            <div class="form-group form-inline">
                <label for="term" class="mx-4 pr-4 h5">期生</label>
                <select name="term" id="term" class="form-control ml-4">
                    <option value=""></option>
                    @foreach($termRanges as $termNumber)
                        @if($termNumber === ($retention_params['term'] ?? ''))
                            <option value="{{ $termNumber }}" selected>{{ $termNumber }}</option>
                        @else
                            <option value="{{ $termNumber }}">{{ $termNumber }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group form-inline">
                <label for="category" class="mr-4 pr-3 h5">カテゴリー</label>
                <select name="category" id="category" class="form-control">
                    <option value=""></option>
                    @foreach($categories as $category)
                        @if($category->id === ($retention_params['category'] ?? ''))
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group form-inline">
                <label for="word" class="mr-4 h5">フリーワード</label>
                <input type="text" name="word" id="word" maxlength="100" class="form-control" value="{{ request()->word ?? '' }}">
            </div>
            <button type="submit" class="btn btn-success btn-lg d-block mx-auto mt-4">検索する</button>
        </form>
    </div>
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
                                    <i class="far fa-edit"></i>編集
                                </a>
                                <form name="deleteform" method="POST" action="{{ route('articles.destroy', $article->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger rounded-pill ml-1" onClick="return Check()">
                                        <i class="far fa-trash-alt"></i>削除
                                    </button>
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
        <!-- クエリ文字列をURLのパラメーターとして追加 -->
        {{ $articles->appends($retention_params ?? '')->links() }}
    </div>
</div>
@endsection
