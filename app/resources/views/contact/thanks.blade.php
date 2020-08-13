@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3 class="my-5">お問い合わせ完了しました</h3>
            <p>お問い合わせありがとうございます。<br>
                以下の内容でお問い合わせいたしました。回答につきまして、担当者が記載されましたメールアドレスへ返信いたしますので、
                しばらくお待ちください。</p>
            {{ Form::open(['route' => 'contact.thanks', 'method' => 'post']) }}
                <div class="control-group form-group">
                        <label>お名前</label>
                        {{ Form::text('name', $contact_content['name'], ['class' => 'form-control', 'readonly']) }}
                </div>
                <div class="control-group form-group">
                        <label>電話番号</label>
                        {{ Form::text('tel', $contact_content['tel'], ['class' => 'form-control', 'readonly']) }}
                </div>
                <div class="control-group form-group">
                        <label>メールアドレス</label>
                        {{ Form::text('email', $contact_content['email'], ['class' => 'form-control', 'readonly']) }}
                </div>
                <div class="control-group form-group">
                    <label>お問い合わせ内容</label>
                    {!! Form::textarea('content', $contact_content['content'], ['class' => 'form-control', 'readonly']) !!}
                </div>
            {{ Form::close() }}
        </div>

    </div>

</div>

@endsection
