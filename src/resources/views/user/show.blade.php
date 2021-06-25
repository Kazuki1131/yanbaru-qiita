@extends('layouts.app')

@include('common.header')

@section('css')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class=container>
    <div class="card user-show w-50 mx-auto">
        <h3 class="card-header text-center py-4"><i class="fas fa-user-alt mr-2"></i>マイページ</h3>
        <div class="card-body pt-2 pb-5">
            <dl class="row justify-content-center">
                <dt>名前</dt>
                <dd>はるき</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>期生</dt>
                <dd>8期生</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>メールアドレス</dt>
                <dd>@@@@@@</dd>
            </dl>
            <div class="row justify-content-center">
                <a class="px-4 btn btn-secondary" href="#">戻る</a>
                <a class="px-4 ml-2 btn btn-success" href="#">編集</a>
            </div>
        </div>
    </div>
    <h3 div class="row justify-content-center mt-5">自分の投稿</h3>
    <div class="card user-show w-50 mx-auto mt-5">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div><i class="fas fa-user-edit mr-3"></i>投稿日時 : 2021-06-26</div>
                <div class="ml-auto">
                    <a href="#" class="px-2 btn btn-secondary" style="display:inline; border-radius:20px;">編集</a>
                    <a href="#" class="px-2 btn btn-danger" style="display:inline; border-radius:20px;">削除</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row justify-content-center">
                <dt>タイトル</dt>
                <dd>Laravel</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>URL</dt>
                <dd><a href="https://qiita.com/shimotaroo/items/6a909797e0139517b1bd">https://qiita.com/shimotaroo/items/6a909797e0139517b1bd</a></dd>
            </dl>
            <div class="row justify-content-center">
                <a class="px-5 btn btn-success" href="#">詳細を見る</a>
            </div>
        </div>
    </div>
    <div class="card user-show w-50 mx-auto mt-5">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div><i class="fas fa-user-edit mr-3"></i>投稿日時 : 2021-06-26</div>
                <div class="ml-auto">
                    <a href="#" class="px-2 btn btn-secondary" style="display:inline; border-radius:20px;">編集</a>
                    <a href="#" class="px-2 btn btn-danger" style="display:inline; border-radius:20px;">削除</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row justify-content-center">
                <dt>タイトル</dt>
                <dd>Laravel</dd>
            </dl>
            <dl class="row justify-content-center">
                <dt>URL</dt>
                <dd><a href="https://qiita.com/shimotaroo/items/6a909797e0139517b1bd">https://qiita.com/shimotaroo/items/6a909797e0139517b1bd</a></dd>
            </dl>
            <div class="row justify-content-center">
                <a class="px-5 btn btn-success" href="#">詳細を見る</a>
            </div>
        </div>
    </div>
</div>

</div>


@endsection
