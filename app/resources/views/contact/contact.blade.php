@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3 class="my-5">お問い合わせ</h3>
            {{ Form::open(['route' => 'contact.confirm', 'method' => 'post']) }}
                <div class="control-group form-group">
                        <label>お名前</label><span class="required">※</span>
                        @error('name')<span class="required">{{ $message }}</span>@enderror
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="control-group form-group">
                        <label>電話番号</label>
                        @error('tel')<span class="required">{{ $message }}</span>@enderror
                        {{ Form::text('tel', null, ['class' => 'form-control']) }}
                </div>
                <div class="control-group form-group">
                        <label>メールアドレス</label><span class="required">※</span>
                        @error('email')<span class="required">{{ $message }}</span>@enderror
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="control-group form-group">
                    <label>お問い合わせ内容</label><span class="required">※</span>
                    @error('content')<span class="required">{{ $message }}</span>@enderror
                    {{ Form::textarea('content', null, ['class' => 'form-control']) }}
                </div>
                {!! Form::button('確認', ['class' => 'btn btn-primary py-2 px-5','type' => 'submit']) !!}
            {{ Form::close() }}
        </div>

    </div>

</div>

@endsection
