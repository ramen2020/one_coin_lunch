@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mt-4 mb-3">ワンコインランチ
        <small>近くのワンコインランチを探そう</small>
    </h1>

    <div class="row">
        {!! Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) !!}
            {!! Form::input('text', 'word', null, ['class' => 'border-secondary form-control', 'placeholder' => '店舗名とか場所とか...']) !!}
            {!! Form::button('検索', ['class' => 'btn border-secondary', 'type' => 'submit'])!!}
        {!! Form::close() !!}
    </div>

</div>
@endsection
