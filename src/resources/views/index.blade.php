@extends('layouts.app')

@include('common.header')

@section('content')
<div class="container">
    <!-- 5件ずつページネーションさせる -->
    <div class="row">
        <div class="col-md-6">
            <div class="my-4">
                <div class="card mx-auto w-100">
                    <div class="card-header p-2 h4">
                        <i class="fas fa-user-edit m-2 font-weight-bold"></i>
                        <p class="d-inline font-weight-bold">名前</p>
                        <!-- 編集と削除ボタンはログイン時のみ表示させる -->
                        <span class="float-right">
                            <a href="#" class="btn btn-secondary rounded-pill">
                                <i class="far fa-edit mr-1"></i>編集
                            </a>
                            <a href="#" class="btn btn-danger rounded-pill">
                                <i class="far fa-trash-alt mr-1"></i>削除
                            </a>
                        </span>
                    </div>
                    <div class="card-body h5">
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">期生</dt>
                            <dd class="col-8">◯期生</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">タイトル</dt>
                            <dd class="col-8">あああああああああああああああああああ</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">URL</dt>
                            <dd class="col-8"><a href="https://qiita.com/">https://qiita.com/</a></dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">投稿日時</dt>
                            <dd class="col-8">{{ NOW() }}</dd>
                        </dl>
                        <a href="#" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="my-4">
                <div class="card mx-auto w-100">
                    <div class="card-header p-2 h4">
                        <i class="fas fa-user-edit m-2 font-weight-bold"></i>
                        <p class="d-inline font-weight-bold">名前</p>
                        <!-- 編集と削除ボタンはログイン時のみ表示させる -->
                        <span class="float-right">
                            <a href="#" class="btn btn-secondary rounded-pill">
                                <i class="far fa-edit mr-1"></i>編集
                            </a>
                            <a href="#" class="btn btn-danger rounded-pill">
                                <i class="far fa-trash-alt mr-1"></i>削除
                            </a>
                        </span>
                    </div>
                    <div class="card-body h5">
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">期生</dt>
                            <dd class="col-8">◯期生</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">タイトル</dt>
                            <dd class="col-8">あああああああああああああああああああ</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">URL</dt>
                            <dd class="col-8"><a href="https://qiita.com/">https://qiita.com/</a></dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">投稿日時</dt>
                            <dd class="col-8">{{ NOW() }}</dd>
                        </dl>
                        <a href="#" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="my-4">
                <div class="card mx-auto w-100">
                    <div class="card-header p-2 h4">
                        <i class="fas fa-user-edit m-2 font-weight-bold"></i>
                        <p class="d-inline font-weight-bold">名前</p>
                        <!-- 編集と削除ボタンはログイン時のみ表示させる -->
                        <span class="float-right">
                            <a href="#" class="btn btn-secondary rounded-pill">
                                <i class="far fa-edit mr-1"></i>編集
                            </a>
                            <a href="#" class="btn btn-danger rounded-pill">
                                <i class="far fa-trash-alt mr-1"></i>削除
                            </a>
                        </span>
                    </div>
                    <div class="card-body h5">
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">期生</dt>
                            <dd class="col-8">◯期生</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">タイトル</dt>
                            <dd class="col-8">あああああああああああああああああああ</dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">URL</dt>
                            <dd class="col-8"><a href="https://qiita.com/">https://qiita.com/</a></dd>
                        </dl>
                        <dl class="row mb-4">
                            <dt class="col-4 text-right">投稿日時</dt>
                            <dd class="col-8">{{ NOW() }}</dd>
                        </dl>
                        <a href="#" class="btn btn-success d-block w-50 mx-auto">詳細を見る</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="my-4">
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#">
                    << /a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">></a></li>
        </ul>
    </nav>
</div>
@endsection
