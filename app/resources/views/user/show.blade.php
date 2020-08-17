@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center border-bottom py-4 mb-5">{{ $user['name'] }}のプロフィール</h2>
    <div class="row">
        <div class="mt-5 col-lg-6 text-center">
            @if($user['id'] === Auth::id())
                <add-user-image-form
                    id='{{ Auth::id() }}'
                    image='{{ Auth::user()->profile_image }}'>
                </add-user-image-form>
            @elseif(empty($user['profile_image']))
                <p>プロフィール画像はまだありません</p>
            @else
                <img class="avatar-img mb-5" alt="" src="../../image/f_f_health_37_s512_f_health_37_1bg.png">
            @endif
        </div>
        <div class="mt-5 col-lg-6">
            <div class="mt-5">
                <h4 class="border-bottom mb-3 pl-2 pb-2">自己紹介</h4>
                @if(!empty($user['introduction']))
                    <p>{!! nl2br(e($user['introduction'])) !!}</p>
                @else
                    <p>自己紹介文がまだありません。自己紹介を書いてみよう！</p>
                @endif
            </div>
            <!-- <div class="mt-5">
                <h4 class="border-bottom mb-3 pl-2 pb-2">メールアドレス</h4>
                <p>{{ $user['email'] }}</p>
            </div> -->
        </div>
    </div>
    <div class="mt-5">
        <h4 class="border-bottom mb-3 pl-2 pb-2">投稿</h4>
        <div class="row">
        @if($restaurants)
            @foreach($restaurants as $restaurant)
                <div class="col-lg-3 mb-2">
                    <div class="card h-100">
                        <a href="{{ $restaurant['image_name'] }}"><img class="card-img-top" src="../../image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="700❌400"></a>
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
                            <div>
                                @if(!empty($restaurant['category_id_1']))
                                    <a href="{{ route('search.category', $restaurant['category_id_1']) }}" class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_1']] }}</a>
                                @endif
                                @if(!empty($restaurant['category_id_2']))
                                    <a href="{{ route('search.category', $restaurant['category_id_2']) }}"　class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_2']] }}</a>
                                @endif
                                @if(!empty($restaurant['category_id_3']))
                                    <a href="{{ route('search.category', $restaurant['category_id_3']) }}"　class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_3']] }}</a>
                                @endif
                                @if(!empty($restaurant['category_id_4']))
                                    <a href="{{ route('search.category', $restaurant['category_id_4']) }}" class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_4']] }}</a>
                                @endif
                                @if(!empty($restaurant['category_id_5']))
                                    <a href="{{ route('search.category', $restaurant['category_id_5']) }}" class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_5']] }}</a>
                                @endif
                        <div>
                        </div>
                    </div></div></div>
                </div>
            @endforeach
        @else
            <p class="col-lg-8 mt-4">投稿がございません。ワンコインでランチが食べられるお店を投稿してみよう！</p>
        @endif
    </div>
</div>


</div>

@endsection
