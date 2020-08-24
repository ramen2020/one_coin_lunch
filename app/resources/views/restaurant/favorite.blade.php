@extends('layouts.app')

@section('content')

<div class="container">
    <div class="new-restaurants">
        <div class="row">
            <h2 class="border-bottom col-lg-12 my-3">お気に入り一覧</h2>
            <div class="row">
                @if(!empty($restaurants[0]))
                    @foreach($restaurants as $restaurant)
                        <div class="col-lg-4 mt-2">
                            <div class="card h-100">
                                <a href="{{ $restaurant['image_name'] }}">
                                    <img class="card-img-top" src="{{ $restaurant['image_name'] }}"
                                        alt="ワンコインランチの画像">
                                </a>

                                <div class="card-body">
                                    <h4>
                                        <a href="/restaurant/show/{{ $restaurant['id'] }}">{{ $restaurant['store_name'] }}</a>
                                    </h4>
                                    <div>
                                        {{ $restaurant['low_budget'] }}円~{{ $restaurant['high_budget'] }}円
                                    </div>
                                    <p>
                                        {{ $restaurant['address'] }}
                                    </p>

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
                                    <div class="d-flex justify-content-end">
                                        @if ($restaurant['is_favorite'])
                                            <favorite-component user-id='{{ Auth::id() }}' restaurant-id="{{ $restaurant['id'] }}"
                                                favorite-id="{{ $restaurant['favorite_id_by_auth'] }}" favorite-count="{{ count($restaurant['favorites']) }}">
                                            </favorite-component>
                                        @else
                                            <favorite-component user-id='{{ Auth::id() }}' restaurant-id="{{ $restaurant['id'] }}"
                                                favorite-count="{{ count($restaurant['favorites']) }}">
                                            </favorite-component>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="pl-10 mt-4">お気に入りしている投稿はございません。</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
