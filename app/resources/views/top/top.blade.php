@extends('layouts.app')

@section('content')

<div class="container">

    <h4 class="mt-4 mb-3">
        近くのワンコインランチを探そう
    </h4>
    <div class="row mx-3 mt-10">
        {{ Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) }}
            {{ Form::input('text', 'word', null, ['class' => 'border-secondary form-control', 'placeholder' => '店舗名とか場所とか...']) }}
            {{ Form::button('検索', ['class' => 'btn border-secondary', 'type' => 'submit']) }}
        {{ Form::close() }}
    </div>

    <div class="row">

        <div class="col-lg-2 mb-4 display-none-sp">
            @include('sidebar.sidebar')
        </div>

        <div class="col-lg-10">
            <!-- 都道府県検索 -->
            <div class="prefecture mb-5 display-none-sp">
                @include('top.prefecture')
            </div>
            <!-- カテゴリから検索 -->
            <div class="category mb-5 display-none-sp">
                @include('top.category')
            </div>

            <div class="new-restaurants">
                <div class="row">
                    @if(Auth::user())
                        <restaurants-list-component :user-id="{{ Auth::id() }}"></restaurants-list-component>
                    @else
                        <restaurants-list-component></restaurants-list-component>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
