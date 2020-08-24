@extends('layouts.app')

@section('content')

<!-- <img class="img-fluid mb-4" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="1200❌300"> -->

<div class="container">

    <h1 class="mt-4 mb-3"></h1>
    <div class="row">

        <div class="col-lg-2 mb-4">
            @include('sidebar.sidebar')
        </div>

        <v-card class="mx-auto col-lg-8" max-width="344">
            @if($restaurant['user_id'] === Auth::id())
                <add-restaurant-image-form id='{{ $restaurant->id }}' image='{{ $restaurant->image_name }}'>
                </add-restaurant-image-form>
            @elseif(empty($restaurant['image_name']))
                <p>画像はまだありません</p>
            @else
                <img class="restaurant-img mb-5" alt="" src="{{ $restaurant['image_name'] }}">
            @endif
            <v-card-title>{{ $restaurant['store_name'] }}</v-card-title>
            <v-card-subtitle>{{ $restaurant['low_budget'] }}円~{{ $restaurant['high_budget'] }}円</v-card-subtitle>
            <v-card-text class="text--primary">
                <div>
                    {{ config('data.prefecture')[$restaurant['prefecture_id']] }}
                    {{ $restaurant['city'] }}
                    {{ $restaurant['street_address'] }}
                </div>
                <div class="pl-10">
                    @if (!$favorite_id)
                        <favorite-component user-id='{{ Auth::id() }}' restaurant-id="{{ $restaurant->id }}" favorite-count="{{ count($restaurant->favorites) }}"></favorite-component>
                    @else
                        <favorite-component user-id='{{ Auth::id() }}' restaurant-id="{{ $restaurant->id }}" favorite-id="{{ $favorite_id }}" favorite-count="{{ count($restaurant->favorites) }}"></favorite-component>
                    @endif
                </div>
            </v-card-text>

            <v-card-actions>
                <div class="p-3">
                    @if(!empty($restaurant['category_id_1']))
                        <v-btn class="ma-1" color="warning" href="{{ route('search.category', $restaurant['category_id_1']) }}">{{ config('data.category')[$restaurant['category_id_1']] }}</v-btn>
                    @endif
                    @if(!empty($restaurant['category_id_2']))
                        <v-btn class="ma-1" color="warning" href="{{ route('search.category', $restaurant['category_id_2']) }}">{{ config('data.category')[$restaurant['category_id_2']] }}</v-btn>
                    @endif
                    @if(!empty($restaurant['category_id_3']))
                        <v-btn class="ma-1" color="warning" href="{{ route('search.category', $restaurant['category_id_3']) }}">{{ config('data.category')[$restaurant['category_id_3']] }}</v-btn>
                    @endif
                    @if(!empty($restaurant['category_id_4']))
                        <v-btn class="ma-1" color="warning" href="{{ route('search.category', $restaurant['category_id_4']) }}">{{ config('data.category')[$restaurant['category_id_4']] }}</v-btn>
                    @endif
                    @if(!empty($restaurant['category_id_5']))
                        <v-btn class="ma-1" color="warning" href="{{ route('search.category', $restaurant['category_id_5']) }}">{{ config('data.category')[$restaurant['category_id_5']] }}</v-btn>
                    @endif
                </div>
                <v-spacer></v-spacer>
            </v-card-actions>

            <v-expand-transition>
                <div>
                    <v-divider></v-divider>
                    <v-card-text>
                        {!! nl2br(e($restaurant['store_infomation'])) !!}
                    </v-card-text>
                    <v-card-text>
                        @if($restaurant['user_id'] === Auth::id())
                            <div>
                                {{ Form::open(['route' => ['restaurant.delete', $restaurant['id'], Auth::id()], 'method' => 'delete']) }}
                                    {!! Form::button('削除する', ['class' => 'btn btn-danger', 'type' => 'submit'])!!}
                                {{ Form::close() }}
                            </div>
                        @endif
                    </v-card-text>
                </div>
            </v-expand-transition>
        </v-card>

    </div>
</div>
@endsection