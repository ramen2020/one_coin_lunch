@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="mx-auto">
            <div class="py-12">
            <h3 class="mb-12">お問い合わせ</h3>
            {{ Form::open(['route' => 'contact.confirm', 'method' => 'post']) }}
                <div class="row">
                    <div class="group col-md-12">
                        {{ Form::text('name', null, ['class' => 'auth-input', 'required']) }}
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class="auth-label">お名前<span class="required">※</span></label>
                        @error('name')<span class="required">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="group col-md-12">
                        {{ Form::text('email', null, ['class' => 'auth-input', 'required']) }}
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class="auth-label">メールアドレス<span class="required">※</span></label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="group col-md-12">
                        {{ Form::textarea('content', null, ['id' => 'contact-textarea', 'class' => 'form-control auth-input', 'required']) }}
                        </textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class="auth-label">お問い合わせ内容<span class="required">※</span></label>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="group col-md-12">
                        {{ Form::button('確認', ['class' => 'btn btn-primary py-2 px-5', 'style' => 'width:100%;color:#fff;', 'type' => 'submit']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
