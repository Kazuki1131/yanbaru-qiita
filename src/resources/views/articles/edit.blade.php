@extends('layouts.app')

@include('common.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center h3"><i class="fas fa-pen mr-2"></i>記事更新</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="text-center my-4"><span class="text-danger">(※)</span>は入力必須項目です。</div>

                        <div class="form-group w-75 mx-auto  mb-4">
                            <label for="title">記事タイトル<span class="text-danger">(※)</span></label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title ?? old('title') }}" autocomplete="title" autofocus>
                            <p class="text-black-50">50文字以内で入力してください。</p>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group w-75 mx-auto mb-4">
                            <p>カテゴリー<span class="text-danger">(※)</span></p>
                            <div class="form-check form-check-inline">
                                @foreach ($categories as $id => $category)
                                    <label class="form-check-label mr-1" for="category_{{ $id }}">{{ $category }}</label>
                                    <input class="form-check-input  mr-5" id="category_{{ $id }}" type="radio" name="category_id" value="{{ $id }}"  {{ old('category_id', $article->category_id) == $id ? 'checked' : ''}}>
                                @endforeach
                            </div>
                            <span class="text-danger d-inline-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        </div>
                        <div class="form-group w-75 mx-auto  mb-4">
                            <label for="summary">記事概要<span class="text-danger">(※)</span></label>
                            <textarea name="summary" id="summary" cols="30" rows="10" class="form-control @error('summary') is-invalid @enderror">{{ $article->summary ?? old('summary') }}</textarea>
                            <p class="text-black-50">30文字以上で入力してください。</p>
                            @error('summary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group w-75 mx-auto">
                            <label for="url">記事URL<span class="text-danger">(※)</span></label>
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $article->url ?? old('url') }}" autocomplete="url">
                            <p class="text-black-50">Qiitaの記事のURLを入力してください。</p>
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mx-auto flex-column w-25 my-5">
                            <button type="submit" class="btn btn-success">
                                更新する
                            </button>
                            <a href="/" class="mt-2 btn btn-secondary">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
