@extends('layouts.app')

@section('content')

<!-- <img class="img-fluid mb-4" src="image/morning-brew-eFSUPUeYs3w-unsplash.jpg" alt="1200❌300"> -->

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
            <h2>新着投稿一覧</h2>
            <div class="row">
                @foreach($restaurants as $restaurant)
                    <div class="col-lg-4 mb-2">
                        <div class="card h-100">
                            <a href="{{ $restaurant['image_name'] }}"><img class="card-img-top" src="" alt="700❌400"></a>
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
                @endforeach
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection
