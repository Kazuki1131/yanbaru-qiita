@extends('layouts.app')

@include('common.header')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection
@section('content')
<div class="container">
    <!-- 5件ずつページネーションさせる -->
    <div class="row">
        <div class="col-md-6">
            <div class="my-4">
            <div class="card mx-auto w-75">
                <div class="card-header p-2">
                    <span class="fas fa-user-edit m-2 font-weight-bold"></span>
                    <p class="d-inline font-weight-bold">名前</p>
                    <!-- 編集と削除ボタンはログイン時のみ表示させる -->
                    <span class="float-right">
                        <a href="#" class="btn btn-secondary rounded-pill">
                            <span class="far fa-edit mr-1"></span>編集
                        </a>
                        <a href="#" class="btn btn-danger rounded-pill">
                            <span class="far fa-trash-alt mr-1"></span>削除
                        </a>
                    </span>
                </div>
                <div class="card-body ">
                    <p><p class="d-inline ml-4">期生</p><p class="d-inline ml-4">◯期生</p></p>
                    <p><p class="d-inline ml-4">タイトル</p><p class="d-inline ml-4">あああああああああああああああ</p></p>
                    <p><p class="d-inline ml-4">URL</p><a href="#" class="ml-4">link</a></p>
                    <p><p class="d-inline ml-4">投稿日時</p><p class="d-inline ml-4">{{ NOW() }}</p></p>
                    <a href="#" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                </div>
            </div> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="my-4">
            <div class="card mx-auto w-75">
                <div class="card-header p-2">
                    <span class="fas fa-user-edit m-2 font-weight-bold"></span>
                    <p class="d-inline font-weight-bold">名前</p>
                    <!-- 編集と削除ボタンはログイン時のみ表示させる -->
                    <span class="float-right">
                        <a href="#" class="btn btn-secondary rounded-pill">
                            <span class="far fa-edit mr-1"></span>編集
                        </a>
                        <a href="#" class="btn btn-danger rounded-pill">
                            <span class="far fa-trash-alt mr-1"></span>削除
                        </a>
                    </span>
                </div>
                <div class="card-body ">
                    <p><p class="d-inline ml-4">期生</p><p class="d-inline ml-4">◯期生</p></p>
                    <p><p class="d-inline ml-4">タイトル</p><p class="d-inline ml-4">あああああああああああああああ</p></p>
                    <p><p class="d-inline ml-4">URL</p><a href="#" class="ml-4">link</a></p>
                    <p><p class="d-inline ml-4">投稿日時</p><p class="d-inline ml-4">{{ NOW() }}</p></p>
                    <a href="#" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="my-4">
            <div class="card mx-auto w-75">
                <div class="card-header p-2">
                    <span class="fas fa-user-edit m-2 font-weight-bold"></span>
                    <p class="d-inline font-weight-bold">名前</p>
                    <!-- 編集と削除ボタンはログイン時のみ表示させる -->
                    <span class="float-right">
                        <a href="#" class="btn btn-secondary rounded-pill">
                            <span class="far fa-edit mr-1"></span>編集
                        </a>
                        <a href="#" class="btn btn-danger rounded-pill">
                            <span class="far fa-trash-alt mr-1"></span>削除
                        </a>
                    </span>
                </div>
                <div class="card-body ">
                    <p><p class="d-inline ml-4">期生</p><p class="d-inline ml-4">◯期生</p></p>
                    <p><p class="d-inline ml-4">タイトル</p><p class="d-inline ml-4">あああああああああああああああ</p></p>
                    <p><p class="d-inline ml-4">URL</p><a href="#" class="ml-4">link</a></p>
                    <p><p class="d-inline ml-4">投稿日時</p><p class="d-inline ml-4">{{ NOW() }}</p></p>
                    <a href="#" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                </div>
            </div> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-4">
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#"><</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">></a></li>
        </ul>
    </nav>
</div>
@endsection
