@extends('layouts.app')

@section('content')

<div class="container">
    <h2>確認画面</h2>
    {{ Form::open(['route' => 'restaurant.store', 'method' => 'post']) }}
        <div class="form-group">
            <label>店舗名</label>
            {{ Form::text('store_name', $restaurant['store_name'], ['class' => 'form-control', 'readonly']) }}
        </div>
        <div class="form-group">
            <label>店舗情報</label>
            {{ Form::textarea('store_infomation', $restaurant['store_infomation'], ['class' => 'form-control', 'readonly']) }}
        </div>
        <div class="form-group">
            <label>都道府県</label><br>
            <div class="form-control" readonly>{{ config('data.prefecture')[$restaurant['prefecture']] }}</div>
            {{ Form::hidden('prefecture', $restaurant['prefecture']) }}
        </div>
        <div class="form-group">
            <label>区市町村</label>
            {{ Form::text('city', $restaurant['city'], ['class' => 'form-control', 'readonly']) }}
        </div>
        <div class="form-group">
            <label>番地など</label>
            {{ Form::text('street_address', $restaurant['street_address'], ['class' => 'form-control', 'readonly']) }}
        </div>
        <div class="form-group">
            <label>下限価格</label>
            {{ Form::text('low_budget', $restaurant['low_budget'], ['class' => 'form-control', 'readonly']) }}
        </div>
        <div class="form-group">
            <label>上限価格</label>
            {{ Form::text('high_budget', $restaurant['high_budget'], ['class' => 'form-control', 'readonly']) }}
        </div>

        <div class="form-group">
            <label>カテゴリ</label>
            @if(!empty($restaurant['category_id_1']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[$restaurant['category_id_1']] }}</div>
                {{ Form::hidden('category_id_1', $restaurant['category_id_1']) }}
            @endif
            @if(!empty($restaurant['category_id_2']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[$restaurant['category_id_2']] }}</div>
                {{ Form::hidden('category_id_2', $restaurant['category_id_2']) }}
            @endif
            @if(!empty($restaurant['category_id_3']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[$restaurant['category_id_3']] }}</div>
                {{ Form::hidden('category_id_3', $restaurant['category_id_3']) }}
            @endif
            @if(!empty($restaurant['category_id_4']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[$restaurant['category_id_4']] }}</div>
                {{ Form::hidden('category_id_4', $restaurant['category_id_4']) }}
            @endif
            @if(!empty($restaurant['category_id_5']))
                <div class="form-control mb-1" readonly>{{ config('data.category')[$restaurant['category_id_5']] }}</div>
                {{ Form::hidden('category_id_5', $restaurant['category_id_5']) }}
            @endif
        </div>
        @if(!empty($restaurant['latitude']))
            <div class="form-group">
                <label>緯度</label>
                {{ Form::text('latitude', $restaurant['latitude'], ['class' => 'form-control', 'readonly']) }}
            </div>
        @endif
        @if(!empty($restaurant['longitude']))
            <div class="form-group">
                <label>経度</label>
                {{ Form::text('longitude', $restaurant['longitude'], ['class' => 'form-control', 'readonly']) }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                {{ Form::submit('戻る', ['name' => 'submit', 'class' => 'btn btn-secondary float-right']) }}
                {{ Form::submit('投稿する', ['name' => 'submit', 'class' => 'btn btn-success float-right mr-3']) }}
            </div>
        </div>
    {{ Form::close() }}

</div>

@endsection
