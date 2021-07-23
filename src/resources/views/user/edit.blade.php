@extends('layouts.app')

@include('common.header')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card my-4">
        <div class="card-header">
          <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>ユーザー情報編集</h3>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('user.update', ['user' => $user]) }}">
            @method('PUT')
            @csrf

            <div class="row justify-content-center mb-4">
              <lavel><span class="text-danger">(※)</span>は入力必須項目です。</lavel>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">名前<span class="text-danger">(※)</span></label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                <small>Slack名を入力してください。</small>
                @error('name')
                <div class="invalid-feedback" role="alert">{{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">期生<span class="text-danger">(※)</span></label>

              <div class="col-md-6">
                <input id="term" type="number" class="form-control @if($errors->has('term')) is-invalid @endif" name="term" value="{{ old('term', $user->term) }}" required autocomplete="term" autofocus>
                <small>半角数字2桁以内で入力してください。</small>
                @error('term')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス<span class="text-danger">(※)<span></label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" autofocus>
                <small>今回は仮のメールアドレスを入力ください。</small>
                @error('email')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mt-4 align-items-center">
              <p class="col-md-4 text-md-right">パスワード</p>
              <p class="col-md-6">パスワードは変更できません</p>
            </div>
            <div class="row justify-content-center mb-2">
              <button type="submit" class="btn btn-success col-md-4 py-2 mt-5">更新する</button>
            </div>
            <div class="row justify-content-center mb-2">
              <a class='btn btn-secondary text-white col-md-4 py-2 mb-4' href="{{ route('user.show') }}">戻る</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    @endsection
