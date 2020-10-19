@extends('layouts.app')

@section('content')

<div class="container">

    @include('layouts.title')

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
