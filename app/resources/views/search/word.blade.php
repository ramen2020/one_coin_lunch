@extends('layouts.app')

@section('content')

<div class="container">
    <div class="mb-100">
        <h1 class="mt-4 pb-4 text-center border-bottom">
            ワード検索
        </h1>
    </div>
    <div>
    {{ Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) }}
        <div class="row">
            {{ Form::input('text', 'word', null, ['class' => 'border-secondary border col-10 offset-2 mx-auto mb-12', 'placeholder' => '店}とか場所とか...']) }}
            {{ Form::button('<i class="fas fa-search pr-2"></i>検索する', ['class' => "btn border col-6 offset-6 mx-auto mt-12", 'type' => 'submit']) }}
        </div>
    {{ Form::close() }}
    </div>

</div>
@endsection
