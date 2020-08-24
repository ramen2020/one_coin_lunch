@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4 mb-3">ワンコインランチ
        <small>近くのワンコインランチを探そう</small>
    </h1>
    {!! Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) !!}
        {!! Form::input('text', 'word', null, ['class' => 'border-secondary form-control', 'placeholder' => '店舗名とか場所とか...']) !!}
        {!! Form::button('検索', ['class' => 'btn input-group-append border-secondary', 'type' => 'submit'])!!}
    {!! Form::close() !!}
    <div class="row">
        <div class="col-lg-2 mb-4">
            @include('sidebar.sidebar')
        </div>
        <div class="col-lg-9">
            <h2 class="mb-5">検索結果</h2>
            <div class="row">
                @if(!empty($restaurants[0]))
                    @foreach($restaurants as $restaurant)
                        <div class="col-lg-4 mt-2">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ $restaurant['image_name'] }}"
                                        alt="ワンコインランチの画像">
                                <div class="card-body">
                                    <h4>
                                        <a href="/restaurant/show/{{ $restaurant['id'] }}">{{ $restaurant['store_name'] }}</a>
                                    </h4>
                                    <p>
                                        {{ $restaurant['low_budget'] }}円~{{ $restaurant['high_budget'] }}円
                                    </p>
                                    <p>
                                        {{ $restaurant['address'] }}
                                    </p>
                                    <div class="text-right">
                                        <a href="{{ route('user.profile', $restaurant->user->id) }}">{{ $restaurant->user->name }}</a>
                                    </div>
                                    <div>
                                        @if(!empty($restaurant['category_id_1']))
                                            <v-btn color="warning" href="{{ route('search.category', $restaurant['category_id_1']) }}"
                                                class="m-1">{{ config('data.category')[$restaurant['category_id_1']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_2']))
                                            <v-btn color="warning" href="{{ route('search.category', $restaurant['category_id_2']) }}"
                                                　class="m-1">{{ config('data.category')[$restaurant['category_id_2']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_3']))
                                            <v-btn color="warning" href="{{ route('search.category', $restaurant['category_id_3']) }}"
                                                　class="m-1">{{ config('data.category')[$restaurant['category_id_3']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_4']))
                                            <v-btn color="warning" href="{{ route('search.category', $restaurant['category_id_4']) }}"
                                                class="m-1">{{ config('data.category')[$restaurant['category_id_4']] }}</v-btn>
                                        @endif
                                        @if(!empty($restaurant['category_id_5']))
                                            <v-btn color="warning" href="{{ route('search.category', $restaurant['category_id_5']) }}"
                                                class="m-1">{{ config('data.category')[$restaurant['category_id_5']] }}</v-btn>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        @if (Auth::user())
                                            @if ($restaurant['is_favorite'])
                                                <favorite-component user-id='{{ Auth::id() }}' restaurant-id="{{ $restaurant['id'] }}"
                                                    favorite-id="{{ $restaurant['favorite_id_by_auth'] }}" favorite-count="{{ count($restaurant['favorites']) }}">
                                                </favorite-component>
                                            @else
                                                <favorite-component user-id='{{ Auth::id() }}' restaurant-id="{{ $restaurant['id'] }}"
                                                    favorite-count="{{ count($restaurant['favorites']) }}">
                                                </favorite-component>
                                            @endif
                                        @else
                                            <div class="d-flex justify-content-end mt-3">
                                                <v-icon color="red" class="material-icons mr-2">
                                                    favorite
                                                </v-icon>{{ count($restaurant['favorites']) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="col-lg-8 mt-4">キーワードを変えて検索しなおしてください</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
