@extends('layouts.app')

@section('content')

<!-- <img class="img-fluid mb-4" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="1200❌300"> -->

<div class="container">

    <h4 class="mt-4 mb-3">
        近くのワンコインランチを探そう
    </h4>

    {!! Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) !!}
        {!! Form::input('text', 'word', null, ['class' => 'border-secondary form-control', 'placeholder' => '店舗名とか場所とか...']) !!}
        {!! Form::button('検索', ['class' => 'btn input-group-append border-secondary', 'type' => 'submit'])!!}
    {!! Form::close() !!}

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
                    <h2 class="border-bottom col-lg-12 my-3">新着投稿一覧</h2>
                    @foreach($restaurants as $restaurant)
                        <div class="col-lg-4 mt-2">
                            <div class="card h-100">
                                <a href="{{ $restaurant['image_name'] }}">
                                    <img class="card-img-top" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg"
                                        alt="ワンコインランチの画像">
                                </a>
                                <div class="card-body">
                                    <h4>
                                        <a href="/restaurant/show/{{ $restaurant['id'] }}">{{ $restaurant['store_name'] }}</a>
                                    </h4>
                                    <p>
                                        {{ $restaurant['high_budget'] }}円~{{ $restaurant['low_budget'] }}円
                                    </p>
                                    <p>
                                        {{ $restaurant['address'] }}
                                    </p>
                                    <div class="text-right">
                                        <a href="{{ route('user.profile', $restaurant->user->id) }}">{{ $restaurant->user->name }}</a>
                                    </div>
                                    <div>
                                        @if(!empty($restaurant['category_id_1']))
                                            <v-btn color="primary" href="{{ route('search.category', $restaurant['category_id_1']) }}"
                                                class="m-1">{{ config('data.category')[$restaurant['category_id_1']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_2']))
                                            <v-btn color="primary" href="{{ route('search.category', $restaurant['category_id_2']) }}"
                                                　class="m-1">{{ config('data.category')[$restaurant['category_id_2']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_3']))
                                            <v-btn color="primary" href="{{ route('search.category', $restaurant['category_id_3']) }}"
                                                　class="m-1">{{ config('data.category')[$restaurant['category_id_3']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_4']))
                                            <v-btn color="primary" href="{{ route('search.category', $restaurant['category_id_4']) }}"
                                                class="m-1">{{ config('data.category')[$restaurant['category_id_4']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_5']))
                                            <v-btn color="primary" href="{{ route('search.category', $restaurant['category_id_5']) }}"
                                                class="m-1">{{ config('data.category')[$restaurant['category_id_5']] }}</v-btn>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="my-4 d-flex justify-content-center">
                {{ $restaurants->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
