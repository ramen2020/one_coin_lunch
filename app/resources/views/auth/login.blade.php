@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-5 row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="border-bottom col-md-12">
                    <h3>Login<h3>
                </div>
            </div>
            <div class="py-12">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="group col-md-12">
                            <input input id="email" type="email" class="auth-input @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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


                    <div class="row">
                        <div class="group col-md-12">
                            <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
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

                    <div class="form-group row mb-0">
                        <div class="col-md-8 mx-auto">
                            <button type="submit" class="btn btn-primary" style="color:#fff; width:100%;">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <a class="btn btn-info mx-auto" style="color:#fff; width:100%;" href="{{ route('login.twitter') }}">
                            <i class="fab fa-twitter"></i>
                            {{ __('twitterでログイン') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
