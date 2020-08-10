@extends('layouts.app')

@section('content')

<!-- <img class="img-fluid mb-4" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="1200❌300"> -->

<div class="container">

    <h1 class="mt-4 mb-3"></h1>
    <div class="row">

        <div class="col-lg-2 mb-4">
            @include('sidebar.sidebar')
        </div>

        <div class="col-lg-9">
            <h2>{{ $restaurant['store_name'] }}</h2>
            <div class="row">
                    <div class="col-lg-12 mb-2">
                        <div class="card h-100">
                            <a href="{{ $restaurant['image_name'] }}"><img class="card-img-top" src="" alt="700❌400"></a>
                            <div class="card-body">
                                <p>
                                    {{ $restaurant['high_budget'] }}円~{{ $restaurant['low_budget'] }}円
                                </p>
                                <p>
                                    {{ config('data.prefecture')[$restaurant['prefecture_id']] }}
                                    {{ $restaurant['city'] }}
                                    {{ $restaurant['street_address'] }}
                                </p>
                                <p>{!! nl2br(e($restaurant['store_infomation'])) !!}</p>
                                <div>
                                    @if(!empty($restaurant['category_id_1']))
                                        <button class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_1']] }}</button>
                                    @endif
                                    @if(!empty($restaurant['category_id_2']))
                                        <button class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_2']] }}</button>
                                    @endif
                                    @if(!empty($restaurant['category_id_3']))
                                        <button class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_3']] }}</button>
                                    @endif
                                    @if(!empty($restaurant['category_id_4']))
                                        <button class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_4']] }}</button>
                                    @endif
                                    @if(!empty($restaurant['category_id_5']))
                                        <button class="btn btn-primary card-text m-1">{{ config('data.category')[$restaurant['category_id_5']] }}</button>
                                    @endif
                                <div>
                            </div>
                        </div></div></div>
                    </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection
