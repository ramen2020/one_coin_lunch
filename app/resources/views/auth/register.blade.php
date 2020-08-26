@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-5 row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="row">
                <div class="border-bottom col-md-12">
                    <h3>Register<h3>
                </div>
            </div>
            <div class="py-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="group col-md-9 offset-md-3">
                            <input id="name" type="text" class="auth-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label class="auth-label">名前</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="group col-md-9 offset-md-3">
                            <input id="email" type="email" class="auth-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label class="auth-label">メールアドレス</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="group col-md-9 offset-md-3">
                            <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label class="auth-label">パスワード</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="group col-md-9 offset-md-3">
                            <input id="password-confirm" type="password" class="auth-input" name="password_confirmation" required autocomplete="new-password">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label class="auth-label">パスワード確認</label>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 mx-auto">
                            <button type="submit" class="btn btn-primary" style="color:#fff; width:100%;">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
