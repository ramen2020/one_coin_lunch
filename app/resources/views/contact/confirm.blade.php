@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3 class="mb-5">入力内容の確認</h3>
            <p>以下でお間違いないでしょうか。</p>
            {{ Form::open(['route' => 'contact.thanks', 'method' => 'post']) }}
                <div class="control-group form-group">
                        <label>お名前</label><span class="required">※</span>
                        @error('name')<span class="required">{{ $message }}</span>@enderror
                        {{ Form::text('name', $contact_content['name'], ['class' => 'form-control', 'readonly']) }}
                </div>
                <div class="control-group form-group">
                        <label>メールアドレス</label><span class="required">※</span>
                        @error('email')<span class="required">{{ $message }}</span>@enderror
                        {{ Form::text('email', $contact_content['email'], ['class' => 'form-control', 'readonly']) }}
                </div>
                <div class="control-group form-group">
                    <label>お問い合わせ内容</label><span class="required">※</span>
                    @error('content')<span class="required">{{ $message }}</span>@enderror
                    {!! Form::textarea('content', $contact_content['content'], ['class' => 'form-control', 'readonly']) !!}
                </div>
                {!! Form::submit('この内容で送信', ['name' => 'submit', 'class' => 'btn btn-success']) !!}
                {!! Form::submit('戻る', ['name' => 'submit', 'class' => 'btn btn-secondary']) !!}
            {{ Form::close() }}
        </div>

    </div>

</div>

@endsection