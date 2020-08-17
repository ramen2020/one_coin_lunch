@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-5">プロフィール編集</h2>
    @if ($errors->any())
        <p id="restaurant-create-error" class="alert alert-danger">※ 入力項目を確認してください。</p>
    @endif
    {{ Form::open(['route' => 'user.updateProfile', 'method' => 'put']) }}
        <div class="form-group">
            <label>お名前</label><span class="required">※</span>
            @error('name')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('name', $user['name'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>メールアドレス</label><span class="required">※</span>
            @error('email')<span class="required">{{ $message }}</span>@enderror
            {{ Form::text('email', $user['email'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label>自己紹介</label><span class="required">※</span>
            @error('introduction')<span class="required">{{ $message }}</span>@enderror
            {{ Form::textarea('introduction', $user['introduction'], ['class' => 'form-control']) }}
        </div>
        <div class="text-center mt-5">
            {!! Form::button('変更する', ['class' => 'btn btn-success py-2 px-5','type' => 'submit']) !!}
        </div>
    {{ Form::close() }}
</div>

@endsection
