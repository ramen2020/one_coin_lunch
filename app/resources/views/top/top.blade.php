@extends('layouts.app')

@section('content')

<!-- <img class="img-fluid mb-4" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="1200❌300"> -->

<div class="container">

    <h4 class="mt-4 mb-3">
        近くのワンコインランチを探そう
    </h4>
    <div class="row mt-10">
        {!! Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) !!}
            {!! Form::input('text', 'word', null, ['class' => 'border-secondary form-control', 'placeholder' => '店舗名とか場所とか...']) !!}
            {!! Form::button('検索', ['class' => 'btn border-secondary', 'type' => 'submit'])!!}
        {!! Form::close() !!}
    </div>

    <div class="row">

        <div class="col-lg-2 mb-4">
            @include('sidebar.sidebar')
        </div>

        <div class="col-lg-9">
            <!-- 都道府県検索 -->
            <div class="prefecture mb-5">
                @include('top.prefecture')
            </div>
            <!-- カテゴリから検索 -->
            <div class="category mb-5">
                @include('top.category')
            </div>

            <div class="new-restaurants">
                <div class="row">
                    @if(Auth::user())
                        <restaurants-list-component user-id="{{ Auth::id() }}"></restaurants-list-component>
                    @else
                        <restaurants-list-component></restaurants-list-component>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
