@extends('layouts.app')

@include('common.header')

@section('content')
<div class="container">
    <div class="card mx-auto w-75">
        <div class="card-header">
            <h2 class="text-center"><i class="fas fa-pen mr-2"></i>記事投稿</h2>
        </div>
        <div class="card-body mx-auto w-75">
            <p class="text-center h5"><span class="text-danger">(※)</span>は入力必須項目です。</p>
            <form action="" method="post">
                <div class="form-group mt-4">
                    <label for="title">
                        <h4>記事タイトル<span class="text-danger">(※)</span></h4>
                    </label>
                    <input type="text" class="form-control form-control-lg" id="title"
                    name="title" maxlength="49" placeholder="記事タイトル" autofocus>
                    <p class="form-text text-muted mb-0">50文字以内で入力してください。</p>
                    <p class="text-danger">タイトルを50文字以内で入力してください。</p>
                </div>
                <div class="form-group mt-4 mb-0">
                    <label class="control-label m-0">
                        <h4>カテゴリー<span class="text-danger">(※)</span></h4>
                    </label>
                </div>
                <div class="form-check form-check-inline form-control-lg">
                    <input type="radio" class="form-check-input" value="laravel" id="laravel" name="categories">
                    <label for="laravel" class="form-check-label">Laravel</label>
                </div>
                <div class="form-check form-check-inline form-control-lg">
                    <input type="radio" class="form-check-input" value="php" id="php" name="categories">
                    <label for="php" class="form-check-label">PHP</label>
                </div>
                <div class="form-check form-check-inline form-control-lg">
                    <input type="radio" class="form-check-input" value="docker" id="docker" name="categories">
                    <label for="docker" class="form-check-label">Docker</label>
                </div>
                <div class="form-check form-check-inline form-control-lg">
                    <input type="radio" class="form-check-input" value="web" id="web" name="categories">
                    <label for="web" class="form-check-label">WEB基礎</label>
                </div>
                <p class="text-danger">カテゴリーを指定してください。</p>
                <div class="form-group mt-4">
                    <label for="description">
                        <h4>記事概要<span class="text-danger">(※)</span></h4>
                    </label>
                    <textarea class="form-control form-control-lg" id="description"
                    name="description" minlength="30" placeholder="記事概要" rows="8"></textarea>
                    <p class="form-text text-muted mb-0">30文字以上で入力してください。</p>
                    <p class="text-danger">記事概要は30文字以上入力してください。</p>
                </div>
                <div class="form-group mt-4">
                    <label for="url">
                        <h4>記事URL<span class="text-danger">(※)</span></h4>
                    </label>
                    <input type="text" name="url" id="url" class="form-control form-control-lg" placeholder="記事URL">
                    <p class="form-text text-muted mb-0">Qiitaの記事のURLを入力してください。</p>
                    <p class="text-danger">有効なURLを指定してください。</p>
                </div>
                <button type="submit" class="btn btn-success btn-lg d-block mx-auto mt-4">投稿する</button>
                <a href="/">
                    <button type="button" class="btn btn-secondary btn-lg d-block mx-auto mt-3">　戻る　</button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection